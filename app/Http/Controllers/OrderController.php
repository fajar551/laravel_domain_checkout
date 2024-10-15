<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Domain;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderCompleted;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu untuk melanjutkan checkout.');
        }

        $user = Auth::user();

        $domain = Domain::firstOrCreate(
            ['name' => $request->input('domain')],
            ['status' => 'available']
        );

        $order = Order::create([
            'user_id' => $user->id,
            'domain_id' => $domain->id,
            'total_price' => 100000,
            'status' => 'UNPAID',
        ]);

        $invoice = Invoice::create(['order_id' => $order->id, 'status' => 'UNPAID']);

        $user->notify(new OrderCompleted($order));

        return redirect()->route('invoice.show', $order->id);
    }

    public function showInvoice($orderId)
    {
        $order = Order::with('domain', 'user')->findOrFail($orderId);
        return view('invoices.invoice', ['order' => $order]);
    }

    public function downloadInvoice($orderId)
    {
        $order = Order::with('domain', 'user')->findOrFail($orderId);
        $pdf = \PDF::loadView('invoices.invoice-pdf', ['order' => $order]);

        return $pdf->download('invoice-' . $orderId . '.pdf');
    }
}

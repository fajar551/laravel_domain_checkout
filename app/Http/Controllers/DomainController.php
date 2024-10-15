<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Support\Facades\Http;

class DomainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function checkDomain(Request $request)
    {
        $domainName = $request->input('domain');
        $response = Http::get("https://portal.qwords.com/apitest/whois.php?domain={$domainName}");

        if ($response->successful()) {
            $status = $response['status'];

            if ($status == 'available') {
                $domainStatus = 'available';

                Domain::updateOrCreate(
                    ['name' => $domainName],
                    ['status' => $domainStatus]
                );

                return view('domain-check-result', [
                    'domain' => $domainName,
                    'status' => $domainStatus
                ]);
            } else {
                $domainStatus = 'unavailable';

                return view('domain-check-result', [
                    'domain' => $domainName,
                    'status' => $domainStatus
                ]);
            }
        } else {
            return back()->with('error', 'Gagal memeriksa domain, coba lagi nanti.');
        }
    }

    public function config($domain)
    {
        return view('config', ['domain' => $domain]);
    }
}

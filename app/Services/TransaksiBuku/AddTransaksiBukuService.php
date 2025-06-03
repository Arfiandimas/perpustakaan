<?php

namespace App\Services\TransaksiBuku;

use App\Base\ServiceBase;
use App\Models\Buku;
use App\Models\TransaksiPeminjaman;
use App\Responses\ServiceResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddTransaksiBukuService extends ServiceBase
{
    protected Request $request;
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function call(): ServiceResponse
    {
        try {
            $this->request->request->remove('_token');
            $this->request->request->remove('_method');
            $data = TransaksiPeminjaman::create($this->request->all());
            return self::success($data);
        } catch (\Throwable $th) {
            Log::error(self::class, [
                'Message ' => $th->getMessage(),
                'On file ' => $th->getFile(),
                'On line ' => $th->getLine()
            ]);
            return self::error(null, $th->getMessage());
        }
    }
}
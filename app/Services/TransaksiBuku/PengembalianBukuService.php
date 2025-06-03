<?php

namespace App\Services\TransaksiBuku;

use App\Base\ServiceBase;
use App\Models\TransaksiPeminjaman;
use App\Responses\ServiceResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengembalianBukuService extends ServiceBase
{
    protected Request $request;
    
    public function __construct(Request $request, protected int $id)
    {
        $this->request = $request;
    }

    public function call(): ServiceResponse
    {
        try {
            $this->request->request->remove('_token');
            $this->request->request->remove('_method');
            $data = TransaksiPeminjaman::whereId($this->id)->update($this->request->all());
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
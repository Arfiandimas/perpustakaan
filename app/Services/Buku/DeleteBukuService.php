<?php

namespace App\Services\Buku;

use App\Base\ServiceBase;
use App\Models\Buku;
use App\Responses\ServiceResponse;
use Illuminate\Support\Facades\Log;

class DeleteBukuService extends ServiceBase
{
    public function __construct(protected int $id)
    {
        
    }

    public function call(): ServiceResponse
    {
        try {
            $data = Buku::where('id', $this->id)->first();
            if ($data) {
                $data->delete();
                return self::success(null, 'Berhasil menghapus data');
            }
            return self::error(null, 'Gagal menghapus data');
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
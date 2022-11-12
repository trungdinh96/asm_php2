<?php
// Định nghĩa namespace theo tên thư mục từ ngoài vào trong;
namespace App\Models;
// khi sử dụng Product ở chỗ khác -> use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
    // Gán bảng cho đối tượng
    protected $table = 'products';
    protected $primaryKey = 'id';
    // khi bảng trong db không có trường created_at và updated_at
    public $timestamps = false;
    public function category () {
        return $this->belongsTo(Category::class, 'id_cate', 'id');
    }

    // Sau này sẽ không cần select * from bảng
    // Mà chỉ cần Product::all() lấy tất cả
    // protected $fillable = ['name', 'price', 'status'];
}

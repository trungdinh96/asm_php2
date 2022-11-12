<?php
// Định nghĩa namespace theo tên thư mục từ ngoài vào trong;
namespace App\Models;
// khi sử dụng Product ở chỗ khác -> use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
class Category extends Model {
    protected $table = 'categories';
    protected $primaryKey = 'id_cate';
    // khi bảng trong db không có trường created_at và updated_at
    public $timestamps = false;
    public function products () {
        return $this->hasMany(Product::class, 'id_cate', 'id');
    }
}
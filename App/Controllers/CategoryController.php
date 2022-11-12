<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController {
    
    // public function getCategory() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'category.categories';
    //     // data view cần biến $name và $price
    //     $data = [
    //         'categories' => Category::all()
    //     ];

    //     return $this->render($viewName, $data);
    // }
    public function index()
    {
        // Controller sẽ tương tác với Model, Model sẽ tương tác với DB để lấy dữ liệu trả cho Controller
        // $products = Product::all(); // lấy ra tất cả các bản ghi

        // $products = Product::paginate(1); // lấy ra 10 bản ghi trên 1 trang
        $categories = Category::select('id_cate', 'name_cate')->where('id_cate', '>', 0)->get(); // lấy ra các bản ghi theo điều kiện
        $count = Category::count(); // đếm số bản ghi trong DB
        // Controller có dữ liệu rồi thì đưa dữ liệu đó cho view để hiển thị ra
        // compact sẽ gói các biến lại thành 1 mảng gồm key là tên biến và value là giá trị của biến đó
        return $this->render('category.index', compact('categories', 'count'));
    }
    public function create()
    {
        return $this->render('category.create', []);
    }

    // POST: Hàm lưu dữ liệu người dùng nhập tạo mới
    
    public function store()
    {
        $category = new Category();
        // KHÔNG LƯU ĐƯỢC KHI CHƯA ĐẶT TIMESTAMPS Ở MODEL VỀ FALSE
         // gán đường dẫn vào thuộc tính avatar
        // Lưu
       
            
        // Thuộc tính của đối tượng vừa khởi tạo phải đúng là tên trường trong bảng products
        $category->name_cate = $_POST['name'];
       
        $category->save();
            
            $url = BASE_URL . 'categories';
            header("location: $url");
        
       
    }
    public function destroy($id)
    {
        // Cách 1: Tìm kiếm Product có id = $id và sau đó xoá Product đó đi bằng phương thức delete()
        $category = Category::find($id); // tìm theo id và trả về 1 đối tương ~ fetch
        // $productWhereFirst = Product::where('id', $id)->first(); // ~ fetch
        // $productWhere = Product::where('id', $id)->get(); // ~ fetchAll

        if ($category && $category->delete()) {
            $url = BASE_URL . 'categories';
            header("location: $url");
        }

        // Cách 2: Không đi tìm nữa, Bảo Product xoá thằng có id = 1
        // Product::destroy($id);
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return $this->render('category.edit', compact('category'));
    }

    public function update($id)
    {
        // Việc cập nhật giá trị 1 bản ghi ~ cập nhật giá trị các thuộc tính của 1 đối tượng sau đó gọi hàm save()
        $category = Category::find($id);
        $category->name_cate = $_POST['name'];
        
        $category->save();

        $url = BASE_URL . 'categories';
        header("location: $url");
    }

}
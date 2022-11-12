<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController {
    public function getProducts() {
        // Hiển thị danh sách sản phẩm bằng render() của BladeOne
        // file view ở new-mvc/App/Views/product/index.blade.php
        $viewName = 'product.index';
        // data view cần biến $name và $price
        $data = [
           
        ];

        return $this->render($viewName, $data);
    }
    public function getListProducts() {
        // Hiển thị danh sách sản phẩm bằng render() của BladeOne
        // file view ở new-mvc/App/Views/product/index.blade.php
        $viewName = 'product.list';
        // data view cần biến $name và $price
        $data = [
            'products' => Product::all()
        ];

        return $this->render($viewName, $data);
    }
    public function index()
    {
        // Controller sẽ tương tác với Model, Model sẽ tương tác với DB để lấy dữ liệu trả cho Controller
        // $products = Product::all(); // lấy ra tất cả các bản ghi

        // $products = Product::paginate(1); // lấy ra 10 bản ghi trên 1 trang
        $products = Product::select('id', 'name', 'price','status','image','mota')->where('id', '>', 0)->get(); // lấy ra các bản ghi theo điều kiện
        $count = Product::count(); // đếm số bản ghi trong DB
        // Controller có dữ liệu rồi thì đưa dữ liệu đó cho view để hiển thị ra
        // compact sẽ gói các biến lại thành 1 mảng gồm key là tên biến và value là giá trị của biến đó
        return $this->render('product.index', compact('products', 'count'));
    }

    // GET: Hàm hiển thị giao diện tạo mới bản ghi
    public function create()
    {
        $category = Category::select('id_cate', 'name_cate')->where('id_cate', '>', 0)->get();
        return $this->render('product.create',  $category);
    }

    // POST: Hàm lưu dữ liệu người dùng nhập tạo mới
    
    public function store()
    {
        $product = new Product();
        // KHÔNG LƯU ĐƯỢC KHI CHƯA ĐẶT TIMESTAMPS Ở MODEL VỀ FALSE
         // gán đường dẫn vào thuộc tính avatar
        // Lưu
       
            
        // Thuộc tính của đối tượng vừa khởi tạo phải đúng là tên trường trong bảng products
        $product->name = $_POST['name'];
        $product->price = (int) $_POST['price'];
        $product->status = (int) $_POST['status'];
        $product->mota = $_POST['description'];
        $fileName = ''; // giá trị mặc định
        $productFile = $_FILES['image']; // lấy file từ form đã submit
        if ($productFile['size'] > 0) { // nếu file có kích thước > 0 ~ có tồn tại
            $path = 'public/img/products/'; // định nghĩa đường dẫn lưu file
            $fileName = $path . uniqid() . '_' . $productFile['name']; // giá trị đường dẫn đến file để lưu vào DB
            move_uploaded_file($productFile['tmp_name'], $fileName); // lưu file (nội dung ở thuộc tính tmp_name) vào đường dẫn $fileName
        }
        $product->image = $fileName;
        $product->save();
            
            $url = BASE_URL . 'products';
            header("location: $url");
        
       
    }
    public function destroy($id)
    {
        // Cách 1: Tìm kiếm Product có id = $id và sau đó xoá Product đó đi bằng phương thức delete()
        $product = Product::find($id); // tìm theo id và trả về 1 đối tương ~ fetch
        // $productWhereFirst = Product::where('id', $id)->first(); // ~ fetch
        // $productWhere = Product::where('id', $id)->get(); // ~ fetchAll

        if ($product && $product->delete()) {
            $url = BASE_URL . 'products';
            header("location: $url");
        }

        // Cách 2: Không đi tìm nữa, Bảo Product xoá thằng có id = 1
        // Product::destroy($id);
    }
    public function edit($id)
    {
        $product = Product::find($id);

        return $this->render('product.edit', compact('product'));
    }

    public function update($id)
    {
        // Việc cập nhật giá trị 1 bản ghi ~ cập nhật giá trị các thuộc tính của 1 đối tượng sau đó gọi hàm save()
        $product = Product::find($id);
        $product->name = $_POST['name'];
        $product->price = (int) $_POST['price'];
        $product->status = (int) $_POST['status'];
        $product->mota = $_POST['description'];
        $fileName = $product->image; // giá trị mặc định
        $productFile = $_FILES['image']; // lấy file từ form đã submit
        if ($productFile['size'] > 0) { // nếu file có kích thước > 0 ~ có tồn tại
            $path = 'public/img/products/'; // định nghĩa đường dẫn lưu file
            $fileName = $path . uniqid() . '_' . $productFile['name']; // giá trị đường dẫn đến file để lưu vào DB
            move_uploaded_file($productFile['tmp_name'], $fileName); // lưu file (nội dung ở thuộc tính tmp_name) vào đường dẫn $fileName
        }
        $product->image = $fileName;
        $product->save();

        $url = BASE_URL . 'products';
        header("location: $url");
    }

    // public function getCreateProducts() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'product.create';
    //     // data view cần biến $name và $price
    //     $data = [
           
    //     ];

    //     return $this->render($viewName, $data);
    // }
    // public function getDetailProducts() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'product.detail';
    //     // data view cần biến $name và $price
    //     $data = [
           
    //     ];

    //     return $this->render($viewName, $data);
    // }
    // public function getEditProducts() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'product.edit';
    //     // data view cần biến $name và $price
    //     $data = [
           
    //     ];

    //     return $this->render($viewName, $data);
    // }
    // public function getBillProducts() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'bill.bill';
    //     // data view cần biến $name và $price
    //     $data = [
           
    //     ];

    //     return $this->render($viewName, $data);
    // }
    // public function getThongkeProducts() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'product.thongke';
    //     // data view cần biến $name và $price
    //     $data = [
           
    //     ];

    //     return $this->render($viewName, $data);
    // }
    // public function getCategory() {
    //     // Hiển thị danh sách sản phẩm bằng render() của BladeOne
    //     // file view ở new-mvc/App/Views/product/index.blade.php
    //     $viewName = 'product.categories';
    //     // data view cần biến $name và $price
    //     $data = [
    //         'categories' => Product::all()
    //     ];

    //     return $this->render($viewName, $data);
    // }

}

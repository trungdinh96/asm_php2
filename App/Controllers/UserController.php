<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController {
    public function index()
    {
        // Tìm kiếm user theo method GET và biến là keyword
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $users = User::get();
        } else {
            $users = User::where('name', 'like', "%$keyword%")->get();
        }

        // Lấy thêm số lượng phần tử


        return $this->render('user.index', compact('users', 'keyword'));
    }
    public function create()
    {
        return $this->render('user.create', []);
    }
    public function store()
    {
        // validate kiểm tra các giá trị gửi lên có không, nếu không có thì phải quay lại đường dẫn form tạo mới
        $user = new User();
        $user->username = $_POST['name'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT); // ở hàm login, cần sử dụng password_verify để tiến hành kiểm tra password
        $user->email = $_POST['email'];
        $user->status = (int) $_POST['status'];

        // Định nghĩa tên file sẽ lưu vào DB
        $fileName = ''; // giá trị mặc định
        $avatarFile = $_FILES['avatar']; // lấy file từ form đã submit
        if ($avatarFile['size'] > 0) { // nếu file có kích thước > 0 ~ có tồn tại
            $path = './public/img/users/'; // định nghĩa đường dẫn lưu file
            $fileName = $path . uniqid() . '_' . $avatarFile['name']; // giá trị đường dẫn đến file để lưu vào DB
            move_uploaded_file($avatarFile['tmp_name'], $fileName); // lưu file (nội dung ở thuộc tính tmp_name) vào đường dẫn $fileName
        }
        $user->avatar = $fileName; // gán đường dẫn vào thuộc tính avatar
        // Lưu
        $user->save();
        $url = BASE_URL . 'users';
        header("location: $url");
    
        // Quay về
    }
    public function edit($id)
    {
        $user = User::find($id);

        return $this->render('user.edit', compact('user'));
    }

    public function update($id)
    {
        // Việc cập nhật giá trị 1 bản ghi ~ cập nhật giá trị các thuộc tính của 1 đối tượng sau đó gọi hàm save()
        $user = User::find($id);
       
        $user->username = $_POST['name'];
        // $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT); // ở hàm login, cần sử dụng password_verify để tiến hành kiểm tra password
        $user->email = $_POST['email'];
        $user->status = (int) $_POST['status'];

        $fileName = $user->avatar; // giá trị mặc định
        $userFile = $_FILES['avatar']; // lấy file từ form đã submit
        if ($userFile['size'] > 0) { // nếu file có kích thước > 0 ~ có tồn tại
            $path = 'public/img/users/'; // định nghĩa đường dẫn lưu file
            $fileName = $path . uniqid() . '_' . $userFile['name']; // giá trị đường dẫn đến file để lưu vào DB
            move_uploaded_file($userFile['tmp_name'], $fileName); // lưu file (nội dung ở thuộc tính tmp_name) vào đường dẫn $fileName
        }
        $user->avatar = $fileName;
        $user->save();

        $url = BASE_URL . 'users';
        header("location: $url");
    }
    public function destroy($id)
    {
        // Cách 1: Tìm kiếm Product có id = $id và sau đó xoá Product đó đi bằng phương thức delete()
        $product = User::find($id); // tìm theo id và trả về 1 đối tương ~ fetch
        // $productWhereFirst = Product::where('id', $id)->first(); // ~ fetch
        // $productWhere = Product::where('id', $id)->get(); // ~ fetchAll

        if ($product && $product->delete()) {
            $url = BASE_URL . 'users';
            header("location: $url");
        }

        // Cách 2: Không đi tìm nữa, Bảo Product xoá thằng có id = 1
        // Product::destroy($id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.product.add');
    }

    public function store(ProductRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['thumbnail'] = '';

        // Lấy thông tin ảnh sản phẩm
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            // Lay duoi file ảnh
            $filename = $file->getClientOriginalName();
            $filename = time() . '-' . $filename;
            $file_size = $file->getSize();
            
            // Kiểm tra dung lượng file ảnh
            if ($file_size > 5000000) {
                dd(678);
                return redirect('admin/products/add')->with('file_error', 'file upload vượt quá kích thước cho phép');
            }

            // Lưu file ảnh trong souce trong folder public/uploads
            $file->move('uploads/',  $filename);
            $thumbnail = 'uploads/' .  $filename;
            $requestAll['thumbnail'] = $thumbnail;
        }

        // Kiểm tra xem sản phẩm thuộc danh mục nào
        if ($request->input('category_id') == '0') {
            dd(678);
            return redirect('admin/products/add')->with('category_error', 'Bạn cần chọn danh mục sản phẩm');
        }

        Product::create([
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount') ?? 0,
            'thumbnail' => $requestAll['thumbnail'],
            'expired_date' => $request->input('expired_date') ?? now()->format('Y-m-d'),
            'category_id' => $request->input('category_id'),
            'discount_code' => $request->input('discount_code')
        ]);

        return redirect('admin/products/list')->with('status', 'Bạn đã thêm sản phẩm thành công');
    }
}

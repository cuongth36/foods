@extends('layouts.admin-master-layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong>Thêm Sản Phẩm</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
           @csrf 
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tên sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="name" placeholder="Nhập tên sản phẩm" class="form-control">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Số lượng</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" min="1" id="email-input" name="amount" placeholder="Nhập số lượng" class="form-control">
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Giá sản phẩm </label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="text-input" name="price" placeholder="Nhập giá thành sản phẩm" class="form-control">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
              <div class="col col-md-3">
                  <label for="text-input-discount" class=" form-control-label">Giảm giá</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="number" id="text-input-discount" min="1" max="100" name="discount" placeholder="Nhập số % muốn giảm giá" class="form-control">
                  @error('discount')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
            </div>

            <div class="row form-group">
              <div class="col col-md-3">
                  <label for="text-input-discount_code" class=" form-control-label">Mã giảm giá</label>
              </div>
              <div class="col-12 col-md-9">
                  <input type="text" id="text-input-discount_code" name="discount_code" placeholder="Nhập mã giảm giá" class="form-control">
                  @error('discount_code')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
            </div>

            <div class="row form-group">
              <div class="col col-md-3">
                  <label for="text-input-discount_code" class=" form-control-label">Hạn sử dụng</label>
              </div>
              <div class="col-12 col-md-9">
                  {{-- <input type="text" id="text-input-discount_code" name="discount_code" placeholder="Nhập số % muốn giảm giá" class="form-control"> --}}
                  {{-- @error('discount_code')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror --}}
              </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Loại sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="category_id" id="select" class="form-control">
                        <option value="1">Trái cây</option>
                        <option value="0">Thịt</option>
                        <option value="2">Hải sản</option>
                        <option value="3">Đông lạnh</option>
                        <option value="4">Gói hàng</option>
                    </select>

                    @if(session('category_error'))
                      <small class="text-danger">{{session('file_error')}}</small>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Nhập thông tin sản phẩm</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="description" id="textarea-input" rows="9" placeholder="Nhập thông tin sản phẩm" class="form-control"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Ảnh 1</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="thumbnail" class="form-control-file">
                    @error('thumbnail')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                    @if(session('file_error'))
                      <small class="text-danger">{{session('file_error')}}</small>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Thêm mới
                </button>
            </div>
        </form>
    </div>
    
</div>
@stop();
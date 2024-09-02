<?php

namespace Modules\Cms\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'image' => 'sometimes|required_if:image, ""|image|max:2048',
            'place' => 'required',
            'vehicle' => 'required',
            'description' => 'required',
            'trip' => 'required',
            'locationStart' => 'required',
            'locationEnd' => 'required',
            'quantityDate' => 'required',
            'dateStart' => 'required',
            'dateEnd' => 'required',
            'category_id' => 'required',
            'tour_guide_id' => 'required'
        ];
    }

    public function message()
    {
        return [
            'id' => 'Mã tour không được để trống',
            'name' => 'Tên tour không được để trống',
            'price' => 'Giá tour không được để trống',
            'discount' => 'Giá giảm không được để trống',
            'image' => 'Hình ảnh không được để trống',
            'place' => 'Điểm đến không được để trống',
            'vehicle' => 'Phương tiện không được để trống',
            'description' => 'Mô tả không được để trống',
            'trip' => 'Hành trình không được để trống',
            'locationStart' => 'Điểm khởi hành không được để trống',
            'locationEnd' => 'Điểm kết thúc không được để trống',
            'quantityDate' => 'Thời lượng chuyến đi không được để trống',
            'dateStart' => 'Ngày khởi hành không được để trống',
            'dateEnd' => 'Ngày kết thúc không được để trống',
            'category_id' => 'Loại tour không được để trống',
            'tour_guide_id' => 'Hướng dẫn viên không được để trống'
        ];
    }
}

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
            'vehicles' => 'required',
            'description' => 'required',
            'trip' => 'required',
            'place_id_start' => 'required',
            'place_id_end' => 'required',
            'quantity' => 'required',
            'dateStart' => 'required',
            'category_id' => 'required',
            'tourGuide_id' => 'required'
        ];
    }

    public function message()
    {
        return [
            'tour_id' => 'Mã tour không được để trống',
            'tour_name' => 'Tên tour không được để trống',
            'tour_price' => 'Giá tour không được để trống',
            'tour_discount' => 'Giá giảm không được để trống',
            'tour_image' => 'Hình ảnh không được để trống',
            'tour_place' => 'Điểm đến không được để trống',
            'tour_vehicle' => 'Phương tiện không được để trống',
            'tour_description' => 'Mô tả không được để trống',
            'tour_trip' => 'Hành trình không được để trống',
            'tour_locationStart' => 'Điểm khởi hành không được để trống',
            'tour_locationEnd' => 'Điểm kết thúc không được để trống',
            'tour_quantytiDate' => 'Thời lượng chuyến đi không được để trống',
            'tour_dateStart' => 'Ngày khởi hành không được để trống',
            'tour_dateEnd' => 'Ngày kết thúc không được để trống',
            'category_id' => 'Loại tour không được để trống',
            'tourGuide_id' => 'Hướng dẫn viên không được để trống'
        ];
    }
}

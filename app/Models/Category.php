<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
//هنا تسمية المتغيرات لازم التزم فيها لانو غير هيك الارفل مارح تتعرف عليهم 
//هنا كل القيم هيا الديفولت لكن كتبتهم عشان لو بدي اغيرهم 
//لو بدي اغير بدل  created at  and update at باسما0ء ثانية
const CREATE_AT = "created_at";
const UPDATE_AT = "updated_at";
//جميع القيم protected 
//ماعدا $incrementing  and  $timestamps

    //لو ما استخدكت الطلبيعي اللي الارفل فاهمو لازم اوضح هذه الامور
   //الارفل افتراضي بحكي انو المودل سنجل والتابل جمع فبربطهم ببعض لكن لو كان اسماء مختلفة
    protected $table = 'categories';
    protected $connection = 'mysql';
    //الارفل افتراضي بعتبر الاي دي برايمري لكن لو غيرت لازم اعمل هيك
    protected $primaryKey = 'id';
    //الارفل افتراضي بعمل البرايمي انو انتجر لكن لو غيرت بعمل هيك
    protected $keyType = 'int';
    //لو عاملة حقل قيمته مش اوتو انكرمت لازم اوقف الخاصية
    public $incrementing = true;
    //لو ماضفت في الجدول خاصية ال timestamp
    //لو مابدي اياها بحطها فولس
    public $timestamps = true;
    //هنا بحكي للارفل اني بسمح انك تعمل كرييت من هدول الخصائص وتخزنهم لو ماكتبت هيك مش رح يقبل يخزنهم
protected $fillable = 
['name','parent_id','description','status','slug','image_path'];
//كيف اعبي الجدول ببيانات مسبقة ؟
//seeder ملف
}

@extends('layouts.app')

@section('content')
<style>
    .visa-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .visa-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 3px solid #D4AF37;
    }

    .visa-header h2 {
        color: #1A2A6C;
        font-size: 28px;
        margin: 0;
        font-weight: 600;
    }

    .visa-header p {
        color: #666;
        margin-top: 10px;
    }

    .visa-form {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #1A2A6C;
        font-weight: 500;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: #D4AF37;
        box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1);
    }

    select.form-control {
        cursor: pointer;
        background: white;
    }

    .row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    /* استايل خاص للحقول الجديدة */
    .conditional-group {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-right: 3px solid #D4AF37;
    }

    .btn-submit {
        background: #1A2A6C;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
    }

    .btn-submit:hover {
        background: #D4AF37;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
    }

    @media (max-width: 768px) {
        .row {
            grid-template-columns: 1fr;
            gap: 0;
        }
        
        .visa-form {
            padding: 20px;
        }
    }
</style>

<div class="visa-container">
    <div class="visa-header">
        <h2>تقديم طلب فيزا شنغن</h2>
        <p>املأ النموذج لتقييم طلبك وتحديد موعد مناسب لرحلتك</p>
    </div>

    <div class="visa-form">
        @if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:12px;
        border-radius:6px;
        margin-bottom:20px;
        border:1px solid #c3e6cb;
        text-align:center;
        font-weight:600;
    ">
        {{ session('success') }}
    </div>
@endif
        <form action="/store" method="POST">
            @csrf
            
            <div class="row">
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" name="nom" class="form-control" placeholder="الاسم الكامل" required>
                </div>

                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="text" name="telephone" class="form-control" placeholder="رقم الهاتف"  required>
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" >
                </div>

                <div class="form-group">
                    <label>المدينة</label>
                    <input type="text" name="ville" class="form-control" placeholder="المدينة" >
                </div>

                <div class="form-group">
                    <label>شنو الدولة اللي باغي تمشي ليها؟</label>
                    <select name="pays" class="form-control"  required>
                        <option value="" disabled selected>-- اختر الدولة --</option>
                        <option>فرنسا</option>
                        <option>إسبانيا</option>
                        <option>ألمانيا</option>
                        <option>إيطاليا</option>
                        <option>الولايات المتحدة الأمريكية (USA)</option>
                        <option>المملكة المتحدة (England / UK)</option>
                        <option>دولة شنغن أخرى</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>الهدف من السفر</label>
                    <select name="objectif" class="form-control"  required>
                        <option value="" disabled selected>-- اختر الهدف من السفر --</option>
                        <option>سياحة</option>
                        <option>عمل</option>
                        <option>دراسة</option>
                        <option>زيارة عائلية</option>
                        <option>علاج</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>هل لديك تاريخ سفر محدد؟</label>
                    <select name="date_ready" class="form-control"  required>
                        <option value="" disabled selected>-- اختر الإجابة --</option>
                        <option>نعم</option>
                        <option>لا</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>تاريخ السفر</label>
                    <input type="date" name="date_voyage" class="form-control">
                </div>

                <div class="form-group">
                    <label>الحالة المهنية</label>
                    <select name="situation" class="form-control"  required>
                        <option value="" disabled selected>-- اختر الحالة المهنية --</option>
                        <option>موظف</option>
                        <option>طالب</option>
                        <option>حر</option>
                        <option>بدون عمل</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>الدخل الشهري</label>
                    <select name="salaire" class="form-control" >
                        <option value="" disabled selected>-- اختر الدخل الشهري --</option>
                        <option>أقل من 3000 درهم</option>
                        <option>3000 - 8000 درهم</option>
                        <option>أكثر من 8000 درهم</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>هل لديك حساب بنكي؟</label>
                    <select name="banque" class="form-control"  required>
                        <option value="" disabled selected>-- اختر الإجابة --</option>
                        <option>نعم</option>
                        <option>لا</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>إذا نعم، شحال فيه تقريباً</label>
                    <select name="solde_banque" class="form-control">
                        <option value="" disabled selected>-- اختر المبلغ التقريبي --</option>
                        <option>أقل من 20000 درهم</option>
                        <option>ما بين 20000 و 50000 درهم</option>
                        <option>أكثر من 50000 درهم</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>سبق ليك درتي فيزا من قبل؟</label>
                    <select name="visa_avant" class="form-control"  required>
                        <option value="" disabled selected>-- اختر الإجابة --</option>
                        <option>نعم</option>
                        <option>لا</option>
                    </select>
                </div>

               
                <div class="form-group">
                    <label>إذا نعم، تقبلات ولا ترفضات؟</label>
                    <select name="resultat_visa" class="form-control">
                        <option value="" disabled selected>-- اختر النتيجة --</option>
                        <option>مقبولة (تم قبول الطلب)</option>
                        <option>مرفوضة (تم رفض الطلب)</option>
                        <option>لم أتقدم من قبل</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>شمن دولة كانت تلك الفيزا؟</label>
                    <input type="text" name="pays_visa_precedente" class="form-control" placeholder="مثال: فرنسا، إسبانيا، إيطاليا...">
                </div>

                <div class="form-group">
                    <label>الميزانية المتوقعة للسفر</label>
                    <select name="budget" class="form-control">
                        <option value="" disabled selected> -- اختر الميزانية المتوقعة --</option>
                        <option>أقل من 5000 درهم</option>
                        <option>5000 - 15000 درهم</option>
                        <option>أكثر من 15000 درهم</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label>حجز موعد</label>
                    <input type="datetime-local" name="rdv" class="form-control"  required>
                </div>
            </div>

            <button type="submit" class="btn-submit">إرسال الطلب</button>
        </form>
    </div>
</div>

@endsection
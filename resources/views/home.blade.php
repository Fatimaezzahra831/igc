@extends('layouts.app')

@section('content')
<style>
    .visa-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .visa-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: none;
    }

    .visa-header h1 {
        color: #1A2A6C;
        font-size: 2.5rem;
        margin: 0 0 20px 0;
        font-weight: 600;
    }

    .visa-header p {
        color: #666;
        font-size: 1.2rem;
        margin-bottom: 40px;
    }

    .btn-gold {
        display: inline-block;
        background: #1A2A6C;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 4px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-gold:hover {
        background: #D4AF37;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        color: #1A2A6C;
        text-decoration: none;
    }
</style>

<div class="visa-container">
    <div class="visa-header">
        <h1>

تقديم طلب فيزا شنغن           
        </h1>
        <p>
            <span style="color: #D4AF37;"></span> قم بتقديم طلبك للحصول على تأشيرة شنغن بسهولة وسرعة <span style="color: #D4AF37;"></span>
        </p>
        <a href="/form" class="btn-gold btn-lg">
         تقديم الطلب الآن
        </a>
    </div>
</div>
@endsection
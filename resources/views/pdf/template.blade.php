<!DOCTYPE html>
<html dir="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
    font-family: 'Amiri', Arial, sans-serif;
    }
    </style>
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
</head>
<body style="height: 100%; position: relative; padding: 1.5rem">
    <header class="flex justify-center mb-30">
        <img src="{{ $data }}" alt="Logo">
    </header>

    <div class="mt-52 text-4xl font-medium flex flex-col items-center justify-center">
      <h2 class="mb-10">المدير الإقليمي</h2>
      <h2 class="mb-10">
        <span class="mx-0.5">إلى السيد (ة)</span>
        <span class="mx-0.5">{{ $prof->f_name_ar }} {{ $prof->l_name_ar }}</span>
      </h2>
      <h2 class="mb-10">
        <span class="mx-0.5">الرقم المالي</span>
        <span class="mx-0.5">:</span>
        <span class="mx-0.5">{{ $prof->ppr }}</span>
      </h2>
      <h2 class="mb-10"
      >
      <span class="mx-0.5">على يد السيد مدير (ة):</span>
      <span class="mx-0.5">{{ $school->name_ar }}</span>
    </h2>
      <h2>طانطان</h2>
    </div>

    <div class="mt-40 text-4xl font-medium flex flex-col items-start justify-center px">
      <h2 class="mb-16">الموضوع : إشعار باقتطاع</h2>
      <h2 class="mb-16 self-center">سلام تام بوجود مولانا الإمام المؤيد بالله</h2>
      <p class="my-3">
        <p>
          <span class="mr-36">وبعد، تطبيقا للمرسوم</span>
          <span class="mx-0.5">2.99.1216</span>
          <span class="mx-0.5">الصادر في</span>
          <span class="mx-0.5">6</span>
          <span class="mx-0.5">صفر</span>
          <span class="mx-0.5">1421</span>
          <span class="mx-0.5"> في شأن الاقتطاعات</span>
          <span class="mx-0.5">من رواتب موظفي</span>
        </p>
        <p class="my-10">
          <span class="mx-0.5">وأعوان الدولة والجماعات المحلية المتغيبين عن العمل بصفة غير مشروعة</span>
          <span class="mx-0.5">تقرر مباشرة الاقتطاع من أجرتك</span>
        </p>
        <p>
          <span class="mx-0.5">الشهرية أيام</span>
          <span class="mx-0.5">:</span>
          <span class="mx-0.5">من</span>
          <span class="mx-0.5">{{ $absence->start }}</span>
          <span class="mx-0.5">الى</span>
          <span class="mx-0.5">{{ $absence->end }}</span>
          <span class="mx-0.5">.</span>
        </p>
      </p>
      <h2 class="my-10 self-end">والسلام</h2>
      <h2 class="self-end">عن مدير الأكاديمية وبتفويض منه</h2>
    </div>

    <footer class="border-t text-2xl flex flex-col items-center" style="margin-top: 470px"> 
      <p class="mt-8">الأكاديمية الجهوية للتربية والتكوين لجهة كلميم واد نون</p>
      <p class="my-3">المديرية الإقليمية بطانطان -مصحة تدبير الموارد البشرية والشؤون الإدارية والمالية</p>
      <p>
        <span class="mx-0.5">شارع الشاطيء</span>
        <span class="mx-0.5">الحي الإداري ،</span>
        <span class="mx-0.5">، الهاتف</span>
        <span class="mx-0.5">0528877093</span>
        <span class="mx-0.5">-</span>
        <span class="mx-0.5">الفاكس</span>
        <span class="mx-0.5">0528877533</span>
      </p>
    </footer>
</body>
</html>

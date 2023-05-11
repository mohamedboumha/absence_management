<html>
    <head>
      <title>PDF</title>
      <meta charset="utf-8">
    </head>
<body>
  <div class="p-5 text-lg" dir="rtl">
    <div class="flex justify-end">
      {{-- <form id="form">
        <button class=" mb-3 p-0 text-white font-bold border px-2 bg-black">
          Imprimer
        </button>
      </form> --}}
    </div>
    <div class="border p-5" id='pdf-container'>

      {{-- <img src="{{ URL::to('/') }}/assets/logo.png" alt=""> --}}

      <div class="mt-20 flex flex-col items-center justify-center">
        <h2 class="mb-3">المدير الإقليمي</h2>
        <h2 class="mb-3">إلى</h2>
        <h2 class="mb-3"> السيد (ة) : الإسم الكامل. ر-م : الرقم المالي</h2>
        <h2 class="mb-3">على يد السيد مدير (ة): اسم المؤسسة</h2>
        <h2>طانطان</h2>
      </div>

      <div class="mt-20 flex flex-col items-start justify-center">
        <h2 class="mb-3">الموضوع : إشعار باقتطاع</h2>
        <h2 class="mb-4 self-center">سلام نام بوجود مولانا الإمام المؤيد بالله</h2>
        <h2 class="mb-3 indent-10">
          وبعد، تطبيقا للمرسوم 2.99.1216 الصادر في 6 صفر 1421 (10 ماي 2000) في شأن الاقتطاعات من رواتب موظفي وأعوان الدولة والجماعات المحلية المتغيبين عن العمل بصفة غير مشروعة، تقرر مباشرة الاقتطاع من أجرتك الشهرية أيام : مدة الغياب.
        </h2>
        <h2 class="mb-1 self-end">والسلام</h2>
        <h2 class="self-end">عن مدير الأكاديمية وبتفويض منه</h2>
      </div>

      <div class="mt-20 text-xs text-center border-t">
        <p class="mt-3">الأكاديمية الجهوية للتربية والتكوين لجهة كلميم واد نون</p>
        <p>المديرية الإقليمية بطانطان -مصحة تدبير الموارد البشرية والشؤون الإدارية والمالية</p>
        <p>شارع الشاطئ، للحي الإداري، الهاتف : 0528877093 - الفاكس 0528877533</p>
      </div>

    </div>
  </div>
  {{-- <script>
    const pdfContainer = document.getElementById('pdf-container')
    const form = document.getElementById('form')
    
    form.onsubmit = (e) => {
                e.preventDefault();
                const formData = new FormData(form);
                fetch('/your-route', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the controller
                })
                .catch(error => {
                    // Handle any errors
                });
            }

  </script> --}}
</body>
</html>
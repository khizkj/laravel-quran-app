<x-layout>

    <x-slot:heading>📖 - The Quran - 📖</x-slot:heading>



<div class="container mb-4 d-flex justify-content-center">
    <div style="width: 100%; max-width: 400px;">
        <input type="text"
               id="surahSearchInput"
               class="form-control text-start"
               dir="ltr"
               placeholder="🔍 Search Surah...">
    </div>
</div>


    <div class="row" id="surahGrid">
        @foreach ($collection as $item)
            <div class="col-md-3 col-sm-6 mb-4 surah-card" data-name="{{ strtolower($item['englishName']) }}" data-number="{{ $item['number'] }}">
                <div class="product-grid">
                    <div class="product-image"></div>
                    <div class="product-content">
                        <h2 class="title">
                            {{ $item['name'] }} | {{ $item['englishName'] }}
                            @if ($item['revelationType'] === 'Medinan')
                                🕌
                            @else
                                🕋
                            @endif
                        </h2>
                        <h3 class="title">{{ $item['englishNameTranslation'] }}</h3>
                        <div class="price">
                            عدد الآیات: {{ $item['numberOfAyahs'] }}
                        </div>
                        <ul class="product-links">
                            <li>
                                <a href="/read/{{ $item['number'] }}">
                                    قراءۃ السورۃ | Read Surah
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        document.getElementById('surahSearchInput').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const surahCards = document.querySelectorAll('.surah-card');

            surahCards.forEach(card => {
                const name = card.getAttribute('data-name');
                const number = card.getAttribute('data-number');
                if (name.includes(query) || number.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

</x-layout>

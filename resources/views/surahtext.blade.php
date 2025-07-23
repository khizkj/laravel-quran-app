<x-layout :heading="'📖 سورۃ کی تلاوت / Surah Recitation 📖'">

    <div class="container mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <a href="/" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>

    <div class="container">
        <div class="row" id="ayahCardsContainer">
            @foreach ($collection as $index => $item)
                <div class="col-md-12 mb-4 col-sm-12">
                    <div class="card product-grid">
                        <div class="card-body text-end">
                            <p class="card-text">آیت نمبر {{ $index + 1 }} | Ayah #{{ $index + 1 }}</p>
                            <hr>

                            {{-- Arabic --}}
                            <h5 class="card-title" id="arabic_{{ $index }}">
                                {{ $item['text'] }}
                            </h5>

                            {{-- English translation (centered) --}}
                            <div class="mt-3 text-center">
                                <p id="translation_{{ $index }}" class="mb-0">🔄 Loading translation...</p>
                            </div>

                            {{-- Audio --}}
                            <div class="text-center mt-2" id="audio_{{ $index }}">
                                🔄 Loading audio...
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const surahNumber = {{ $snum }};

            try {
                const englishResponse = await fetch(`https://api.alquran.cloud/v1/surah/${surahNumber}/en.asad`);
                const englishData = await englishResponse.json();

                const arabicResponse = await fetch(`https://api.alquran.cloud/v1/surah/${surahNumber}/ar.alafasy`);
                const arabicData = await arabicResponse.json();

                const englishAyahs = englishData.data.ayahs;
                const arabicAyahs = arabicData.data.ayahs;

                englishAyahs.forEach((ayah, index) => {
                    const translationElem = document.getElementById(`translation_${index}`);
                    const audioElem = document.getElementById(`audio_${index}`);

                    const audioUrl = arabicAyahs[index]?.audio;

                    if (translationElem) {
                        translationElem.textContent = ayah.text || 'No translation available';
                    }

                    if (audioElem && audioUrl) {
                        audioElem.innerHTML = `
                            <audio controls>
                                <source src="${audioUrl}" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                        `;
                    } else if (audioElem) {
                        audioElem.textContent = '🎵 No Audio Available';
                    }
                });
            } catch (error) {
                console.error('Failed to fetch translation or audio:', error);
            }
        });
    </script>

    <style>
        .product-grid {
            background-color: #f7f3f3;
            border: 1px solid #0000000F;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border-radius: 20px;
        }

        .product-grid .card-title {
            font-size: 20px;
            font-family: 'Amiri Quran', serif;
        }

        .product-grid p {
            font-family: 'Lora', serif;
            font-size: 16px;
        }

        body.dark-mode .product-grid {
            background-color: #1e1e1e;
            border: 1px solid #333;
        }

        body.dark-mode .product-grid .card-title,
        body.dark-mode .product-grid p {
            color: #ffffff;
        }
    </style>

</x-layout>

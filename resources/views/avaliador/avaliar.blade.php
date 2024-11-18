@extends('layouts.app')
@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl w-full">
        <h2 class="text-center text-xl font-bold mb-4">Área de Avaliação</h2>
        <div class="border-b border-gray-300 mb-4"></div>

        <div class="flex justify-between items-stretch mb-4 gap-4 sm:gap-8">
            <!-- Tema Section -->
            <div class="w-full h-full flex flex-col justify-between gap-2">
                <div class="w-full h-full flex flex-col items-stretch">
                    <p class="text-gray-600 font-semibold text-center">Titulo</p>
                    <div class="bg-gray-100 border text-gray-700 p-2 rounded h-full">
                        <p class="h-full">{{ $trabalho->titulo }}</p>
                    </div>
                </div>
                <div class="w-full h-full flex flex-col items-stretch">
                    <p class="text-gray-600 font-semibold text-center">Resumo</p>
                    <div class="bg-gray-100 border text-gray-700 p-2 rounded h-full">
                        <p class="h-full">{{ $trabalho->resumo }}</p>
                    </div>
                </div>
            </div>

            <!-- Protocolo and Avaliador Section -->
            <div class="flex flex-col justify-between">
                <div class="">
                    <p class="text-gray-600 font-semibold text-center text-lg">Protocolo</p>
                    <div class="bg-gray-100 border text-sm text-gray-700 p-2 rounded text-center"><span>{{ $trabalho->protocolo }}</span></div>
                </div>
                <div>
                    <p class="text-gray-600 font-semibold text-center text-lg">Avaliador</p>
                    <div class="bg-gray-100 border text-sm text-gray-700 p-2 rounded text-center"><span>{{ Auth::user()->name }}</span></div>
                </div>
            </div>
        </div>

        <form action="{{ route('avaliador.trabalho.avaliar', $trabalho->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <!-- Criteria Fields -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Fez a introdução de forma clara e objetiva</label>
                    <div class="flex items-center space-x-2">
                        <div class="star-rating" data-index="0">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star cursor-pointer text-gray-400 text-4xl" data-value="{{ ($i + 1) * 2 }}"
                                onclick="setNota(0, {{ ($i + 1) * 2 }})">&#9733;</span>
                                @endfor
                        </div>
                        <input type="number" id="input-nota-0" class="w-20 text-center border rounded-lg" min="0" max="10" step="1" value="0"
                            oninput="atualizaNotaDigitada(0, this.value)" />
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Organização Lógica da Apresentação</label>
                    <div class="flex items-center space-x-2">
                        <div class="star-rating" data-index="1">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star cursor-pointer text-gray-400 text-4xl" data-value="{{ ($i + 1) * 2 }}"
                                onclick="setNota(1, {{ ($i + 1) * 2 }})">&#9733;</span>
                                @endfor
                        </div>
                        <input type="number" id="input-nota-1" class="w-20 text-center border rounded-lg" min="0" max="10" step="1" value="0"
                            oninput="atualizaNotaDigitada(1, this.value)" />
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Independência do material apresentado</label>
                    <div class="flex items-center space-x-2">
                        <div class="star-rating" data-index="2">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star cursor-pointer text-gray-400 text-4xl" data-value="{{ ($i + 1) * 2 }}"
                                onclick="setNota(2, {{ ($i + 1) * 2 }})">&#9733;</span>
                                @endfor
                        </div>
                        <input type="number" id="input-nota-2" class="w-20 text-center border rounded-lg" min="0" max="10" step="1" value="0"
                            oninput="atualizaNotaDigitada(2, this.value)" />
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Clareza e minuciosidade</label>
                    <div class="flex items-center space-x-2">
                        <div class="star-rating" data-index="3">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star cursor-pointer text-gray-400 text-4xl" data-value="{{ ($i + 1) * 2 }}"
                                onclick="setNota(3, {{ ($i + 1) * 2 }})">&#9733;</span>
                                @endfor
                        </div>
                        <input type="number" id="input-nota-3" class="w-20 text-center border rounded-lg" min="0" max="10" step="1" value="0"
                            oninput="atualizaNotaDigitada(3, this.value)" />
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Tempo de apresentação</label>
                    <div class="flex items-center space-x-2">
                        <div class="star-rating" data-index="4">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star cursor-pointer text-gray-400 text-4xl" data-value="{{ ($i + 1) * 2 }}"
                                onclick="setNota(4, {{ ($i + 1) * 2 }})">&#9733;</span>
                                @endfor
                        </div>
                        <input type="number" id="input-nota-4" class="w-20 text-center border rounded-lg" min="0" max="10" step="1" value="0"
                            oninput="atualizaNotaDigitada(4, this.value)" />
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Conclusões finais</label>
                    <div class="flex items-center space-x-2">
                        <div class="star-rating" data-index="5">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="star cursor-pointer text-gray-400 text-4xl" data-value="{{ ($i + 1) * 2 }}"
                                onclick="setNota(5, {{ ($i + 1) * 2 }})">&#9733;</span>
                                @endfor
                        </div>
                        <input type="number" id="input-nota-5" class="w-20 text-center border rounded-lg" min="0" max="10" step="1" value="0"
                            oninput="atualizaNotaDigitada(5, this.value)" />
                    </div>
                </div>
            </div>

            <!-- Nota Final (Oculta para envio) -->
            <input type="hidden" id="nota-total" name="nota">

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-4">
                <div>
                    <label class="text-gray-600 font-semibold">Nota Final</label>
                    <input id="nota-final" type="text" class="border-gray-300 rounded-lg text-center w-20 ml-2" value="0" readonly>
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Enviar
                </button>
            </div>
        </form>

        <script>
            var notas = [0, 0, 0, 0, 0, 0]; // Array para armazenar as notas

            function setNota(index, value) {
                // Garante que o valor esteja entre 0 e 10
                value = Math.max(0, Math.min(10, parseFloat(value) || 0));

                // Atualiza a nota no array
                notas[index] = value;

                // Atualiza as estrelas (preenche as estrelas até a nota selecionada)
                var stars = document.querySelectorAll('.star-rating[data-index="' + index + '"] .star');
                stars.forEach(star => {
                    var starValue = parseFloat(star.getAttribute('data-value'));
                    if (starValue <= value) {
                        star.classList.remove('text-gray-400');
                        star.classList.add('text-yellow-500');
                    } else {
                        star.classList.remove('text-yellow-500');
                        star.classList.add('text-gray-400');
                    }
                });

                // Atualiza o input de nota
                document.getElementById('input-nota-' + index).value = value;

                // Atualiza o valor da nota final
                atualizaNotaFinal();
            }

            function atualizaNotaDigitada(index, value) {
                // Garante que o valor digitado esteja entre 0 e 10
                value = Math.max(0, Math.min(10, parseFloat(value) || 0)).toFixed(2);

                // Atualiza o campo do input
                document.getElementById('input-nota-' + index).value = value;

                // Atualiza as estrelas de acordo com o valor digitado
                setNota(index, value);

                // Atualiza a nota final
                atualizaNotaFinal();
            }

            function atualizaNotaFinal() {
                var soma = notas.reduce((total, nota) => total + nota, 0);
                var notaFinal = (soma / notas.length).toFixed(2);

                // Atualiza o campo de Nota Final e o campo oculto para envio
                document.getElementById('nota-final').value = notaFinal;
                document.getElementById('nota-total').value = notaFinal;
            }
        </script>

    </div>
</div>
@endsection
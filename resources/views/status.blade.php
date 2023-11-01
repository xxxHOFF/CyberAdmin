@extends('layout')

@section('content')

    <style>

        .pc-square {
            width: 70px;
            height: 70px;
            background-color: #a4d0a5;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
        }

        .pc_element {
            padding: 4rem 0;
            height: 0;
        }

    </style>

    <div class="vh-100" style="margin-top: 15vh">

        <div class="container">
            <div class="row row-cols-5 justify-content-center">
                <div class="col">
                    <div class="pc_element">
                        <div class="pc-square" id="pc29">
                            29
                        </div>
                        <div class="text-warning" id="pc29-reservationTimer"></div>
                        <div class="text-danger" id="pc29-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc28">
                            28
                        </div>
                        <div class="text-warning" id="pc28-reservationTimer"></div>
                        <div class="text-danger" id="pc28-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc27">
                            27
                        </div>
                        <div class="text-warning" id="pc27-reservationTimer"></div>
                        <div class="text-danger" id="pc27-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc26">
                            26
                        </div>
                        <div class="text-warning" id="pc26-reservationTimer"></div>
                        <div class="text-danger" id="pc26-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc25">
                            25
                        </div>
                        <div class="text-warning" id="pc25-reservationTimer"></div>
                        <div class="text-danger" id="pc25-rentTimer"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="pc_element">
                        <div class="pc-square" id="pc20">
                            20
                        </div>
                        <div class="text-warning" id="pc20-reservationTimer"></div>
                        <div class="text-danger" id="pc20-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc19">
                            19
                        </div>
                        <div class="text-warning" id="pc19-reservationTimer"></div>
                        <div class="text-danger" id="pc19-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc18">
                            18
                        </div>
                        <div class="text-warning" id="pc18-reservationTimer"></div>
                        <div class="text-danger" id="pc18-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc17">
                            17
                        </div>
                        <div class="text-warning" id="pc17-reservationTimer"></div>
                        <div class="text-danger" id="pc17-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc16">
                            16
                        </div>
                        <div class="text-warning" id="pc16-reservationTimer"></div>
                        <div class="text-danger" id="pc16-rentTimer"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="pc_element">
                        <div class="pc-square" id="pc15">
                            15
                        </div>
                        <div class="text-warning" id="pc15-reservationTimer"></div>
                        <div class="text-danger" id="pc15-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc14">
                            14
                        </div>
                        <div class="text-warning" id="pc14-reservationTimer"></div>
                        <div class="text-danger" id="pc14-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc13">
                            13
                        </div>
                        <div class="text-warning" id="pc13-reservationTimer"></div>
                        <div class="text-danger" id="pc13-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc12">
                            12
                        </div>
                        <div class="text-warning" id="pc12-reservationTimer"></div>
                        <div class="text-danger" id="pc12-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc11">
                            11
                        </div>
                        <div class="text-warning" id="pc11-reservationTimer"></div>
                        <div class="text-danger" id="pc11-rentTimer"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="pc_element">
                        <div class="pc-square" id="pc10">
                            10
                        </div>
                        <div class="text-warning" id="pc10-reservationTimer"></div>
                        <div class="text-danger" id="pc10-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc9">
                            9
                        </div>
                        <div class="text-warning" id="pc9-reservationTimer"></div>
                        <div class="text-danger" id="pc9-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc8">
                            8
                        </div>
                        <div class="text-warning" id="pc8-reservationTimer"></div>
                        <div class="text-danger" id="pc8-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc7">
                            7
                        </div>
                        <div class="text-warning" id="pc7-reservationTimer"></div>
                        <div class="text-danger" id="pc7-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc6">
                            6
                        </div>
                        <div class="text-warning" id="pc6-reservationTimer"></div>
                        <div class="text-danger" id="pc6-rentTimer"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="pc_element">
                        <div class="pc-square" id="pc5">
                            5
                        </div>
                        <div class="text-warning" id="pc5-reservationTimer"></div>
                        <div class="text-danger" id="pc5-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc4">
                            4
                        </div>
                        <div class="text-warning" id="pc4-reservationTimer"></div>
                        <div class="text-danger" id="pc4-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc3">
                            3
                        </div>
                        <div class="text-warning" id="pc3-reservationTimer"></div>
                        <div class="text-danger" id="pc3-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square " id="pc2">
                            2
                        </div>
                        <div class="text-warning" id="pc2-reservationTimer"></div>
                        <div class="text-danger" id="pc2-rentTimer"></div>
                    </div>
                    <div class="pc_element">
                        <div class="pc-square" id="pc1">
                            1
                        </div>
                        <div class="text-warning" id="pc1-reservationTimer"></div>
                        <div class="text-danger" id="pc1-rentTimer"></div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 justify-content-center mt-5">
                <div class="row row-cols-4">
                    <div class="col">
                        <div class="pc_element">
                            <div class="pc-square" id="pc24">
                                24
                            </div>
                            <div class="text-warning" id="pc24-reservationTimer"></div>
                            <div class="text-danger" id="pc24-rentTimer"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pc_element">
                            <div class="pc-square" id="pc23">
                                23
                            </div>
                            <div class="text-warning" id="pc23-reservationTimer"></div>
                            <div class="text-danger" id="pc23-rentTimer"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pc_element">
                            <div class="pc-square" id="pc22">
                                22
                            </div>
                            <div class="text-warning" id="pc22-reservationTimer"></div>
                            <div class="text-danger" id="pc22-rentTimer"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="pc_element">
                            <div class="pc-square" id="pc21">
                                21
                            </div>
                            <div class="text-warning" id="pc21-reservationTimer"></div>
                            <div class="text-danger" id="pc21-rentTimer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        function updateTimers() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/get-status-timers', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    for (const item of data) {
                        const pc = item.pc;
                        const type = item.type;
                        const time = item.remainingTime;
                        const timerElement = document.getElementById(pc + '-' + type + 'Timer');
                        const pcSquareElement = document.querySelector(`#${pc}`);

                        if (time < 0) {
                            timerElement.textContent = formatTime(time);
                            pcSquareElement.style.backgroundColor = type === 'reservation' ? '#f9e79b' : '#e68387';
                        } else if (time > 0){
                            timerElement.textContent = '+' + formatTime(time);
                            pcSquareElement.style.backgroundColor = '#f9e79b';
                        }
                    }
                }
            };

            xhr.send();
        }

        function formatTime(seconds) {
            seconds = Math.abs(seconds);

            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            return `${String(hours)}ч. ${String(minutes)}мин.`;
        }

        document.addEventListener('DOMContentLoaded', function () {
            updateTimers();
        });

    </script>

@endsection

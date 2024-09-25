<!doctype html>
<html lang="en">
<head>
    <title>Traffic Light</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        div {
            margin: 20px;
        }
        .light {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: gray;
            border-radius: 50%;
        }
        .yellow {
            background-color: yellow;
        }
        .red {
            background-color: red;
        }
        .green {
            background-color: green;
        }
    </style>
</head>
<body>

<h1>Traffic Light</h1>
<div>
    <label for="signal">Choose signal</label>
    <select id="signals">
        <option value="A">SIGNAL A</option>
        <option value="B">SIGNAL B</option>
        <option value="C">SIGNAL C</option>
        <option value="D">SIGNAL D</option>
    </select>
</div>
<div>
    <label for="greenInterval">Green Interval:</label>
    <input type="number" id="greenInterval" min="1">
</div>
<div>
    <label for="yellowInterval">Yellow Interval:</label>
    <input type="number" id="yellowInterval" min="1">
</div>
<div>
    <button id="startBtn">Start</button>
    <button id="stopBtn">Stop</button>
</div>
<div id="signalDisplay">
    <div id="signalA" class="signal">A: <span class="light" id="lightA"></span></div>
    <div id="signalB" class="signal">B: <span class="light" id="lightB"></span></div>
    <div id="signalC" class="signal">C: <span class="light" id="lightC"></span></div>
    <div id="signalD" class="signal">D: <span class="light" id="lightD"></span></div>
</div>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    document.getElementById('startBtn').addEventListener('click', function () {
        const signal = document.getElementById('signals').value;
        const greenInterval = parseInt(document.getElementById('greenInterval').value) * 1000;
        const yellowInterval = parseInt(document.getElementById('yellowInterval').value) * 1000;
        
        if (isNaN(greenInterval) || isNaN(yellowInterval)) {
            alert("Please enter valid intervals.");
            return;
        }
        startSignal(signal, greenInterval, yellowInterval);
    });

    document.getElementById('stopBtn').addEventListener('click', function () {
        stopSignal();
    });

    let signalInterval;
    
    function startSignal(signal, greenInterval, yellowInterval) {
        clearInterval(signalInterval);
        signalInterval = setInterval(() => {
            const light = document.getElementById(`light${signal}`);
            light.className = 'light green';
            setTimeout(() => {
                light.className = 'light yellow';
                setTimeout(() => {
                    light.className = 'light red';
                }, yellowInterval);
            }, greenInterval);
        }, greenInterval + yellowInterval);
    }

    function stopSignal() {
        clearInterval(signalInterval);
        const lights = document.querySelectorAll('.light');
        lights.forEach(light => light.className = 'light gray');
    }
</script>
</body>
</html>

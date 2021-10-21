<!DOCTYPE HTML>
<html>

<head>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }
    </style>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <canvas id="game" width="1300" height="600"></canvas>

    <script>
        function draw() {
            var canvas = document.getElementById('game');
            var ctx = canvas.getContext('2d');

            //   ctx.fillStyle = 'gray';
            //   ctx.translate(80, 60);//translate MOVE o PONTO DE ORIGEM
            //   //o 0 0 agora é 80 60
            //   ctx.fillRect(0, 0, 140, 30);
            //CENTRO HORIZONTAL SERIA A DISTANCIA DO HORIZONTE (80) + O TAMANHO HORIZONTAL(140) DIVIDIDO POR 2
            //RESULTANDO EM 150
            //MESMA LOGICA PARA DEFINIR O CENTRO VERTICAL, 60 + 30/2


            //   ctx.translate(0,0);
            //   ctx.translate(200,200);
            //   ctx.rotate(45 * Math.PI / 180);

            //   ctx.fillStyle = 'red';

            //   ctx.fillRect(0, 0, 140, 30);
            ctx.save();

            //Quadrado rotacionado
            ctx.fillStyle = 'gray';
            ctx.translate(200, 200);
            ctx.rotate(45 * Math.PI / 180);
            ctx.fillRect(0, 0, 100, 100);
            ctx.rotate(-45 * Math.PI / 180);
            //no zero, a linha vermelha estará certa
            //no 100, a ponta da linha vermelha ( hipotenusa/2 está na nova ponta do inicio)
            //talvez você precise somar 



            ctx.fillStyle = 'blue';
            //Caixas azuis pra representar o novo centro e a reta do 00
            ctx.fillRect(0, 0, -200, -200);
            ctx.fillStyle = 'darkblue';
            ctx.fillRect(0, 0, -200,  200);

            ctx.restore();
            ctx.fillStyle = 'red';
            ctx.fillRect(197,197,6,6);
            
            //hip = squareRoot(lado1*lado1 + lado2*lado2);

            ctx.fillRect(197,197+(141.4/2),(141.4/2),6);


            

        }
        draw();
    </script>
</body>

</html>
<html>

<head>
  <title>Pong</title>
  <link rel="stylesheet" href="css.css">
</head>

<body>

  <canvas id="game" width="1300" height="600px">


  </canvas>
</body>

<script>
  var canvas = document.getElementById('game');
  var ctx = canvas.getContext('2d');
  var speedBar = 20;
  var cwidth = canvas.width;
  var cheight = canvas.height;
  var fps = 60;

  let posP1 = 250;
  let posP2 = 250;
  let p1X = 20;
  let p2X = 1245;
  let bWidth=35;
  let bPosX = cwidth / 2;
  let bPosY = cheight / 2;
  let bRadius = 25;
  let bSpeedX = 0.1; //afther the first impact with the ball, the speed goes up
  let bSpeedY = 0;
  let bSpeedM = 10;



  //10 0 - reto horizontal
  //5 5 - 45°
  //7 3
  //6 4
  //8 2


  //a cada .1 segundo, ele vai verificar a posição da bolinha e, se ela estiver na linha do player 1 ou player 2
  //ela vai verificar se a barrinha do p1X ou p2X está naquele local
  //se estiver, ela verifica o centro dela e 
  //se ele bate acima do centro, vai pra cima
  //no centro vai reto
  //pra baixo a bolinha vai pra baixo

  //inicialmente eu só quero fazer a barrinha mecher



  function draw() {
    ctx.fillStyle='white';
    ctx.save();
    
    //barrap1X
    roundedRect(ctx, p1X, 250, bWidth, 100, 5, '#fff');

    //middleBar
    ctx.rect((cwidth / 2) - 2, 0, 4, cheight);
    ctx.fill();

    //barrap2X
    roundedRect(ctx, p2X, 250, bWidth, 100, 5, '#fff');
    // restore();

    //Ball
    drawnBall();
  }

  function drawField() {
    ctx.restore();
    //middleBar
    ctx.beginPath();
    ctx.rect((cwidth / 2) - 2, 0, 4, cheight);
    ctx.fill();

  }

  function moveUp(p = 1) {
    if (p == 1) {
      if (posP1 > 0) {
        ctx.clearRect(p1X, posP1, 35, 100);
        posP1 -= speedBar;
        
      }
    } else if (p == 2) {
      //Fazendo duas vezes pra ver se dá mais fluidez.
      //tenho que testar mais a fundo pra ver se realmente está mais fluido
      if (posP2 > 0) {
        ctx.clearRect(p2X, posP2, 35, 100);
        posP2 -= speedBar;
        
        
      }

    }

  }

  function moveDown(p = 1) {
    if (p == 1) {
      if (posP1 < 500) {

        ctx.clearRect(p1X, posP1, 35, 100);
        posP1 += speedBar / 2;
        roundedRect(ctx, p1X, posP1, 35, 100, 5, '#fff');

        ctx.clearRect(p1X, posP1, 35, 100);
        posP1 += speedBar / 2;
        roundedRect(ctx, p1X, posP1, 35, 100, 5, '#fff');
      }
    } else if (p == 2) {
      //Fazendo duas vezes pra ver se dá mais fluidez.
      //tenho que testar mais a fundo pra ver se realmente está mais fluido
      if (posP2 < 500) {
        ctx.clearRect(p2X, posP2, 35, 100);
        posP2 += speedBar / 2;
        roundedRect(ctx, p2X, posP2, 35, 100, 5, '#fff');

        ctx.clearRect(p2X, posP2, 35, 100);
        posP2 += speedBar / 2;
        roundedRect(ctx, p2X, posP2, 35, 100, 5, '#fff');
      }
    }

  }

  function drawnBall() {
    //bRadius = 25;
    ctx.beginPath();
    ctx.arc(bPosX, bPosY, bRadius, 0, 2 * Math.PI);
    ctx.fill();

  }

  function updateBall() {
    ctx.clearRect(bPosX - (bRadius+10), bPosY - (bRadius+10), 70, 70);

    drawField();

    var update = verifyImpact((bPosX+(bSpeedX*bSpeedM)),(bPosY+(bSpeedY*bSpeedM)));
    if(update){
      bPosY +=bSpeedY*bSpeedM;
      bPosX +=bSpeedX*bSpeedM;


      ctx.beginPath();
      ctx.arc(bPosX, bPosY, bRadius, 0, 2 * Math.PI);
      ctx.fill();
    }
    roundedRect(ctx, p1X, posP1, 35, 100, 5, '#fff');
    roundedRect(ctx, p2X, posP2, 35, 100, 5, '#fff');


    
  }

  function verifyImpact(newPosX,newPosY){
    if(newPosX>=1223 || newPosX<=75){
      
      //verificar se foi em cima, baixo ou meio da barra e 
      //calcular nova velocidade
      if(newPosX==75){
        if((bPosY+bRadius)>= posP1  && (bPosY-bRadius)<=posP1+100){
          bSpeedX=-bSpeedX;
          return false;
        }
      }if(newPosX==1223){
        if((bPosY+bRadius)>= posP2  && (bPosY-bRadius)<=posP2+100){
          bSpeedX=-bSpeedX;
          return false;
        }
      }else{

      }
      
      
      return true;
      
    }
    return true;
  }
  
  function roundedRect(ctx, x, y, width, height, radius, color = 'white') {
    ctx.beginPath();
    ctx.moveTo(x, y + radius);
    ctx.lineTo(x, y + height - radius);
    ctx.quadraticCurveTo(x, y + height, x + radius, y + height);
    ctx.lineTo(x + width - radius, y + height);
    ctx.quadraticCurveTo(x + width, y + height, x + width, y + height - radius);
    ctx.lineTo(x + width, y + radius);
    ctx.quadraticCurveTo(x + width, y, x + width - radius, y);
    ctx.lineTo(x + radius, y);
    ctx.quadraticCurveTo(x, y, x, y + radius);
    if (color) {
      ctx.fillStyle = color;
      ctx.fill();
    } else {
      ctx.stroke();
    }

  }


  const controller = {
    87: {
      pressed: false
    },
    83: {
      pressed: false
    },
    38: {
      pressed: false
    },
    40: {
      pressed: false
    },
    13: {
      pressed: false
    },
  }

  document.addEventListener("keydown", (e) => {
    if (controller[e.keyCode]) {
      controller[e.keyCode].pressed = true;
    }

  })
  document.addEventListener("keyup", (e) => {
    if (controller[e.keyCode]) {
      controller[e.keyCode].pressed = false;
    }

  })
  const executeMoves = () => {

    Object.keys(controller).forEach(key => {
      if (controller[key].pressed && key == 87) {
        moveUp();
      } else if (controller[key].pressed && key == 83) {
        moveDown();
      } else if (controller[key].pressed && key == 38) {
        moveUp(2);
      } else if (controller[key].pressed && key == 40) {
        moveDown(2);
      } else if (controller[key].pressed && key == 13) {
        updateBall();
      }
      updateBall();
      //requestAnimationFrame(updateBall());
      
    })
  }

  function main() {
    

    executeMoves();
    globalID = requestAnimationFrame(main);
    
  }
  globalID = requestAnimationFrame(main);
  draw();
  main();

  

  
</script>

</html>
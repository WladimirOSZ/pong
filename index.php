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
  let posP1=250;
  let posP2=250;
  let p1=20;
  let p2=1245;
  var canvas = document.getElementById('game');
  var ctx = canvas.getContext('2d');
  function init() {
    clock();
    setInterval(clock, 1000);
  }

  //a cada .1 segundo, ele vai verificar a posição da bolinha e, se ela estiver na linha do player 1 ou player 2
  //ela vai verificar se a barrinha do p1 ou p2 está naquele local
  //se estiver, ela verifica o centro dela e 
  //se ele bate acima do centro, vai pra cima
  //no centro vai reto
  //pra baixo a bolinha vai pra baixo

  //inicialmente eu só quero fazer a barrinha mecher

  function init() {

  }

  function draw() {
    var canvas = document.getElementById('game');
    var ctx = canvas.getContext('2d');
    // save();

    //barrap1
    roundedRect(ctx, 20, 250, 35, 100, 5, '#fff');
    //barrap2

    roundedRect(ctx, 1245, 250, 35, 100, 5, '#fff');
    // restore();

    ctx.clearRect(10, 10, 100, 100);
  }

  function moveUp(p = 1) {
    if(p==1){
        if(posP1>0){

          ctx.clearRect(p1, posP1, 35, 100);
          posP1-=5;
          roundedRect(ctx, p1, posP1, 35, 100, 5, '#fff');

          ctx.clearRect(p1, posP1, 35, 100);
          posP1-=5;
          roundedRect(ctx, p1, posP1, 35, 100, 5, '#fff');
        }
    }else if(p==2){
      //Fazendo duas vezes pra ver se dá mais fluidez.
      //tenho que testar mais a fundo pra ver se realmente está mais fluido
      if(posP2>0){
        ctx.clearRect(p2, posP2, 35, 100);
        posP2-=5;
        roundedRect(ctx, p2, posP2, 35, 100, 5, '#fff');

        ctx.clearRect(p2, posP2, 35, 100);
        posP2-=5;
        roundedRect(ctx, p2, posP2, 35, 100, 5, '#fff');
      }

    }
    

    

  }

  function moveDown(p=1) {
    if(p==1){
        if(posP1<500){

          ctx.clearRect(p1, posP1, 35, 100);
          posP1+=5;
          roundedRect(ctx, p1, posP1, 35, 100, 5, '#fff');

          ctx.clearRect(p1, posP1, 35, 100);
          posP1+=5;
          roundedRect(ctx, p1, posP1, 35, 100, 5, '#fff');
        }
    }else if(p==2){
      //Fazendo duas vezes pra ver se dá mais fluidez.
      //tenho que testar mais a fundo pra ver se realmente está mais fluido
      if(posP2<500){
        ctx.clearRect(p2, posP2, 35, 100);
        posP2+=5;
        roundedRect(ctx, p2, posP2, 35, 100, 5, '#fff');

        ctx.clearRect(p2, posP2, 35, 100);
        posP2+=5;
        roundedRect(ctx, p2, posP2, 35, 100, 5, '#fff');
      }
  }

  }

  function drawnCircle() {
    var ctx = canvas.getContext('2d');
    var circle = new Path2D();
    circle.moveTo(125, 35);
    circle.arc(100, 35, 25, 0, 2 * Math.PI);
    ctx.fill(circle);
  }

  function roundedRect(ctx, x, y, width, height, radius, color = 0) {
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
  draw();
  function animate(times=10){

  }

  const controller = {
  87: {pressed: false},
  83: {pressed: false},
  38: {pressed: false},
  40: {pressed: false},
}

document.addEventListener("keydown", (e) => {
  if(controller[e.keyCode]){
    controller[e.keyCode].pressed = true;
  }
  executeMoves();
})
document.addEventListener("keyup", (e) => {
  if(controller[e.keyCode]){
    controller[e.keyCode].pressed = false;
  }
  executeMoves();
})
const executeMoves = () => {
  
  Object.keys(controller).forEach(key=> {
    if(controller[key].pressed && key == 87){
      moveUp();
    }else if(controller[key].pressed && key == 83){
      moveDown();
    }else if(controller[key].pressed && key == 38){
      moveUp(2);
    }else if(controller[key].pressed && key == 40){
      moveDown(2);
    }
  })
}
  // window.addEventListener('keydown', this.check, false);
  // //38 40 
  // //87 83
  // function check(e) {
  //   if(e.keyCode == 87){
  //     moveUp();
  //   }else if (e.keyCode == 38) {
  //     moveUp(2);
  //   }else if (e.keyCode == 83) {
  //     moveDown();
  //   }else if (e.keyCode == 40) {
  //     moveDown(2);
  //   }
  // }
</script>

</html>
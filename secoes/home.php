<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
          
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='css/stylle.css'>

  <link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
  <link rel='stylesheet' type='text/css' href='../css/app.css'>
  <script src='../js/bootstrap.bundle.js'></script>
  <script src='../../js/app.js'></script>
  <script>
        function gerarRelatorioDespesas() {
            window.open('../relatorios/relatorioDespesas.php', '_blank');
        }
        function gerarRelatorioReceitas(){
          window.open('../relatorios/relatorioReceitas.php', '_blank');
        }
    </script>
</head>
<body>
<div >
    <span>
        <button class="btn btn-primary" onclick="gerarRelatorioDespesas()">Gerar Relatório das despesas</button>
        <button class="btn btn-primary" onclick="gerarRelatorioReceitas()">Gerar Relatório das Receitas</button>
     
      </span>

    
   


    

</div>
</body>
</html>
<?php
use afeam\api\domain\Relatorio;
use Mpdf\Mpdf;

$app->get('/relatorios/{tipo}/{mes}/{ano}', function ($request, $response, $args) {
    
    $relatorio = new Relatorio();
    $mes = $args['mes'];
    $ano = $args['ano'];
    $tipo = "";
    $data = "";

    switch($args['tipo']){

        case 0:
        
        $data =  $relatorio->relatorioDeTodosOsClientes($mes, $ano);
        $tipo = "Clientes Afeam";
        break;
        case 1:

        $data =  $relatorio->relatorioClienteComStatusEmProcesso($mes, $ano);
        $tipo = "Clientes Em Processo ";
        break;
        case 2:
        $data =  $relatorio->relatorioClientesComStatusDeferido($mes, $ano);
        $tipo = "Clientes Deferidos";
        break;
        case 3:
        $data =  $relatorio->relatorioClienteComStatusIndeferido($mes, $ano);
        $tipo = "Clientes Indeferidos";
        break;

        default:
        break;

    }
    
   if($data != false){
        $header = '<div style="text-align: center; width : 100%";  heigth : 50px; background-color: "#fafafa">
            <h1> Relatorio de '.$tipo.' </h1> 
            </div>
            <table border = "1">
                <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Status</th>
                <th>Situação</th>
                </tr>
            ';

         // retorn o mpdf
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($header.$data."</table>");
        $mpdf->Output('report_afeam.pdf', 'D');
        //return $response->write(json_encode($data))->withStatus(200);

        return $response->withStatus(200);       
    }

    return $response->write("sem dados")->withStatus(500);
});

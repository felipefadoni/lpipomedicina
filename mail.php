<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

if ($_POST) {
  $from = $_POST['nome'] . "<" . $_POST['email'] . ">";

  $to = "marketing@ipomais.com.br";

  $subject = $_POST['nome'] . " - PRÉ MATRÍCULA IPO+ MEDICINA";

  $message = "<h4>PRÉ MATRÍCULA IPO+ MEDICIAN</h4>";
  $message .= "NOME: " . $_POST['nome'] . "<br />";
  $message .= "EMAIL: " . $_POST['email'] . "<br />";
  $message .= "TELEFONE: " . $_POST['celular'] . "<br />";
  $message .= "PERÍODO: " . $_POST['periodo'];

  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

  // Create email headers
  $headers .= 'From: ' . $from . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["message" => "E-mail enviado com sucesso!", "code" => 0]);
  } else {
    echo json_encode(["message" => "Erro ao enviar o e-mail, tente novamente mais tarde.", "code" => 1]);
  }
} else {
  echo json_encode(["message" => "Preencha todos os dados corretamente.", "code" => 1]);
}

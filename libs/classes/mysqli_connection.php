<?php
#############################################
#                                           #
# Autor: Roberto Beraldo Chaiben (Beraldo)  #
#      E-Mail: rbchaiben@gmail.com          #
#                                           #
#############################################

/*
   Classe para conex�o com banco de dados MySQL usando a extens�o MySQLi, dispon�vel a partir do PHP 5.
   A classe cont�m o construtor de conex�o, registrando os poss�veus erros de conex�o no arquivo db_errors.log, e o destrutor, para fechar a conex�o. As demais fgun��es de banco de dados s�o padr�es da classe myslqi, devendo ser usadas, por exemplo, desta forma:
   
   $this->query();


   Caso voc� n�o tenha um arquivo de inicializa��o que defina as constantes para conex�o com o banco de dados e o caminho para o diret�rio dos arquivos de logs de erro, descomente a parte do c�digo que usa a fun��o define() e configure-a com as informa��es para conex�o.

*/

// Constantes paea conex�o com o banco de dados:
/*
define ("DB_SERVIDOR", "localhost");
define ("DB_USUARIO", "root");
define ("DB_SENHA", "asxz123");
define ("DB_NOME", "testes");
define ("LOGS_PATH", "logs/");
*/


class MySQLiConnection extends mysqli
{
	
	/*
	   Fun��o __construct()
	   Realiza automaticamene a conex�o com o banco de dados ao instanciar o objeto com o opeador new ($my = new MySQLiConnection()).
	*/
	
	public function __construct()
	{
		try
		{
			//Executa @mysqli_connect (DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_NOME);
			@parent::__construct (DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_NOME);
			
			if (mysqli_connect_errno() != 0)//se a conex�o falhar
			    throw new Exception (mysqli_connect_errno() . " - " . mysqli_connect_error());
		}
		catch (Exception $db_error)
		{
			$mensagem = $db_error->getMessage();
			$arquivo = $db_error->getFile();
			$data = date ("Y-m-d H:i:s");
			$ip_visitante = $_SERVER['REMOTE_ADDR'];
			
			if (!file_exists (LOGS_PATH))
			    mkdir (LOGS_PATH);
			
			// mensagem que ser� salva no arquivo de logs do banco de dados
			$log = $data . " | " . $mensagem . " | " . $arquivo . " | " . $ip_visitante . "\r\n\r\n";
			error_log ($log, 3, LOGS_PATH . "db_errors.log");
			
			$error_code = mysqli_connect_errno();
			if (function_exists ("Erro".$error_code))
			{
				switch ($error_code)
				{
					case 1045:
					  Erro1045 (DB_USUARIO);
					  break;
					case 1049:
					  Erro1049 (DB_SERVIDOR);
					  break;
					case 2003:
					  Erro2003 (DB_SERVIDOR);
					  break;
					case 2005:
					  Erro2005 (DB_SERVIDOR);
					  break;
					default:
					  call_user_func ("Erro".$error_code);
					  break;
				}
			}
			else
			{
				echo "Erro ao conectar ao banco de dados MySQL. O erro foi reportado e o administrador do sistema tomar� as devidas provid�ncias.";
			}
			exit;
			
		}
	}
	
	/*
	   Fun��o __destruct()
	   Caso haja uma conex�o com o banco de dados, fecha-a automaticamente ao terminar de executar o script.
	*/
	public function __destruct()
	{
		if (mysqli_connect_errno() == 0)// se a conex�o n�o falhou
			$this->close();
	}
	
}

?>
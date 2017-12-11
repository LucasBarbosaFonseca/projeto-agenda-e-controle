	var req;

	//Função para buscar registros com a data referente a informada 
	function BuscaReservaRetroprojetorPorData(valor_data) {

		//Verificando Browser 
		if (window.XMLHttpRequest) {
			req = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			req = new ActiveXObject("Microsoft.XMLHTTP");
		}

		//Arquivo PHP juntamente com o valor digitado no campo (método GET)
		var url = "BuscaReservaRetroprojetor.php?valor_data="+valor_data;

		//Chamada do método open para processar a requisição
		req.open("Get", url, true);

		//Quando o objeto recebe o retorno, chamamos a seguinte função:
		req.onreadystatechange = function() {

			//Verifica se o Ajax realizou todas as operações corretamente
			if (req.readyState == 4 && req.status == 200) {

				//Resposta retornada pelo BuscaReservaRetroprojetor.php
				var resposta = req.responseText;

				//Abaixo colocamos a(s) resposta(s) na table datagrid
				document.getElementById('datagrid').innerHTML = resposta;

			}

		}
		req.send(null);
	}
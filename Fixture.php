<?php
define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$conn = new \OC\Cliente\Database\ServicesDB();
$dados = new \OC\Cliente\Database\Dados($conn->conexao());
$cliente = new OC\Cliente\Cliente();

echo "### DELETANDO TABELA ###\n";
$conn->conexao()->query("DROP TABLE IF EXISTS cliente;");
echo " - OK\n";

echo "### CRIANDO TABELA ###\n";
$conn->conexao()->query("CREATE TABLE cliente (
              id INT NOT NULL AUTO_INCREMENT,
              nome VARCHAR(45) NULL,
              email VARCHAR(255) NULL,
              endereco VARCHAR(255) NULL,
              tipo VARCHAR(25) NULL,
              star VARCHAR(2) NULL,
              PRIMARY KEY (id))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci");
echo " - OK\n";

echo "### INSERINDO DADOS NA TABELA ###\n";

    $cliente1 = $cliente->setNome('Marcos Almeida Cavalcanti')->setEmail('MarcosAlmeidaCavalcanti@rhyta.com')->setEndereco(array('Residencial' => 'Rua Joaquim Elias de Figueiredo, 632, João Pessoa-PB, 58057-306'))->setTipo('Fisico')->setStar(2);
    $dados->persist($cliente1);

    $cliente2 = $cliente->setNome('Aline Barbosa Alves')->setEmail('AlineBarbosaAlves@armyspy.com')->setEndereco(array('Residencial' => 'Rua Fernando de Noronha, 189, Santarém-PA, 68015-050', 'Cobranca' => 'Rua Joaquim Elias de Figueiredo, 632, João Pessoa-PB, 58057-306'))->settipo('juridica')->setStar(4);
    $dados->persist($cliente2);

    $cliente3 = $cliente->setNome('Bianca Pereira Almeida')->setEmail('BiancaPereiraAlmeida@jourrapide.com')->setEndereco(array('Residencial' => 'Rua D, 821 Porto Alegre-RS 90245-150', 'Cobranca' => 'Rua Fernando de Noronha, 189, Santarém-PA, 68015-050'))->setTipo('juridica')->setStar(5);
    $dados->persist($cliente3);

    $cliente4 = $cliente->setNome('Miguel Castro Costa')->setEmail('MiguelCastroCosta@armyspy.com')->setEndereco(array('Residencial' => 'Avenida Dom Bosco, 209 Ponte Nova-MG 35430-232'))->setTipo('fisico')->setStar(1);
    $dados->persist($cliente4);

    $cliente5 = $cliente->setNome('Clara Carvalho Ferreira')->setEmail('ClaraCarvalhoFerreira@jourrapide.com')->setEndereco(array('Residencial' => 'Rua Rio Ipojuca, 838 Campo Limpo Paulista-SP 13232-151'))->settipo('fisico')->setStar(5);
    $dados->persist($cliente5);

    $cliente6 = $cliente->setNome('Ágatha Almeida Oliveira')->setEmail('gathaAlmeidaOliveira@dayrep.com')->setEndereco(array('Residencial' => 'Rua Oliveira Lima, 1958 Santos-SP 11075-510', 'Cobranca' => 'Rua Rio Ipojuca, 838 Campo Limpo Paulista-SP 13232-151'))->settipo('juridica')->setStar(3);
    $dados->persist($cliente6);

    $cliente7 = $cliente->setNome('Letícia Rocha Ferreira')->setEmail('LetciaRochaFerreira@dayrep.com')->setEndereco(array('Residencial' => 'Rua Benjamin Stauffer, 366 Ribeirão Preto-SP 14020-350'))->settipo('fisico')->setStar(2);
    $dados->persist($cliente7);

    $cliente8 = $cliente->setNome('Júlia Sousa Rodrigues')->setEmail('JliaSousaRodrigues@dayrep.com')->setEndereco(array('Residencial' => 'Rua São João, 340 Brusque-SC 88355-369', 'Cobranca' => 'Rua Benjamin Stauffer, 366 Ribeirão Preto-SP 14020-350'))->settipo('juridica')->setStar(4);
    $dados->persist($cliente8);

    $cliente9 = $cliente->setNome('Mateus Correia Azevedo')->setEmail('MateusCorreiaAzevedo@teleworm.us')->setEndereco(array('Residencial' => 'Rua Madre de Deus, 1309 São Paulo-SP 03119-000', 'Cobranca' =>  'Rua São João, 340 Brusque-SC 88355-369'))->settipo('juridica')->setStar(3);
    $dados->persist($cliente9);

    $cliente10 = $cliente->setNome('Luis Rocha Silva')->setEmail('LuisRochaSilva@rhyta.com')->setEndereco(array('Residencial' => 'Rua Amália Strapasson de Souza, 289 Colombo-PR 83413-560'))->settipo('fisico')->setStar(5);
    $dados->persist($cliente10);

    $dados->flush();

echo " - OK\n";
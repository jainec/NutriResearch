<?php
    use PHPUnit\Framework\TestCase;
    include '..\Controller\calculoAlimentoReceita.php';

    class calculoAlimentoReceitaTest extends TestCase {
        /** @test */
        public function gramasIgual100ParaReceitaIngredientesTest() {
            $nomeReceita = 'Brigadeiro1';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [100, 100];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro1 Quantidade: 100 Energia: 200 Proteina: 200 Carboidrato: 200 Lipideo: 200 Calcio: 200 Ferro: 200 Vit. C: 200 Vit. A: 200";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

         /** @test */
         public function gramasIgual100ParaReceitaDiferendeDe100ParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro2';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [200, 50];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro2 Quantidade: 100 Energia: 250 Proteina: 250 Carboidrato: 250 Lipideo: 250 Calcio: 250 Ferro: 250 Vit. C: 250 Vit. A: 250";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasMaiorQue100ParaReceitaVariandoParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro4';
            $gramasReceita = 200;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [50, 150];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro4 Quantidade: 100 Energia: 100 Proteina: 100 Carboidrato: 100 Lipideo: 100 Calcio: 100 Ferro: 100 Vit. C: 100 Vit. A: 100";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasMenorQue100ParaReceitaVariandoParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro5';
            $gramasReceita = 50;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [200, 50];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro5 Quantidade: 100 Energia: 500 Proteina: 500 Carboidrato: 500 Lipideo: 500 Calcio: 500 Ferro: 500 Vit. C: 500 Vit. A: 500";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasComValoresReaisTest() {
            $nomeReceita = 'Brigadeiro6';
            $gramasReceita = 120.5;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [55.5, 150.8];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro6 Quantidade: 100 Energia: 171.20 Proteina: 171.20 Carboidrato: 171.20 Lipideo: 171.20 Calcio: 171.20 Ferro: 171.20 Vit. C: 171.20 Vit. A: 171.20";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasMenorQue0ParaReceita() {
            $nomeReceita = 'Brigadeiro7';
            $gramasReceita = -1;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [50, 50];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Valor informado para as gramas da receita é negativo e, logo, inválido.";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasMenorQue0ParaIngredientes() {
            $nomeReceita = 'Brigadeiro8';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [-50, -100];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Valor informado para as gramas do(s) ingrediente(s) é negativo e, logo, inválido.";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasIgualCaracteresParaReceitaTest() {
            $nomeReceita = 'Brigadeiro15';
            $gramasReceita = 'ed';
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [100, 100];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Division by zero";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }
        
        /** @test */
        public function gramasIgualCaracteresParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro16';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = ['j', 'a'];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "A non-numeric value encountered";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }



       //*** VALORES LIMITES ***//

       /** @test */
        public function gramasIgual0ParaReceitaTest() {
            $nomeReceita = 'Brigadeiro9';
            $gramasReceita = 0;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [100, 100];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Division by zero";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasIgual0ParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro10';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [0, 0];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Division by zero";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasIgual01ParaReceitaTest() {
            $nomeReceita = 'Brigadeiro11';
            $gramasReceita = 0.1;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [100, 100];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro11 Quantidade: 100 Energia: 200000 Proteina: 200000 Carboidrato: 200000 Lipideo: 200000 Calcio: 200000 Ferro: 200000 Vit. C: 200000 Vit. A: 200000";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasIgual01ParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro12';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [0.1, 0.1];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro12 Quantidade: 100 Energia: 0.2 Proteina: 0.2 Carboidrato: 0.2 Lipideo: 0.2 Calcio: 0.2 Ferro: 0.2 Vit. C: 0.2 Vit. A: 0.2";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasIgual02ParaReceitaTest() {
            $nomeReceita = 'Brigadeiro13';
            $gramasReceita = 0.2;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [1, 1];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro13 Quantidade: 100 Energia: 1000 Proteina: 1000 Carboidrato: 1000 Lipideo: 1000 Calcio: 1000 Ferro: 1000 Vit. C: 1000 Vit. A: 1000";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

        /** @test */
        public function gramasIgual02ParaIngredientesTest() {
            $nomeReceita = 'Brigadeiro14';
            $gramasReceita = 100;
            $ingrediente1 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente1->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Leite condensado'))->willReturn(89);
            $ingrediente2 = $this->getMockBuilder('Alimento')->setMethods(['getIdAlimento'])->getMock();
            $ingrediente2->expects($this->once())->method('getIdAlimento')->with($this->equalTo('Chocolate em pó'))->willReturn(90);
            $arrayIngredientes = [$ingrediente1->getIdAlimento('Leite condensado'),$ingrediente2->getIdAlimento('Chocolate em pó')]; 
            $medidas = $this->getMockBuilder('Medida')->setMethods(['getIdMedida'])->getMock();
            $medidas->expects($this->once())->method('getIdMedida')->with($this->equalTo('Gramas'))->willReturn(1);
            $gramas = $medidas->getIdMedida('Gramas');
            $arrayMedidas = [$gramas, $gramas];       
            $arrayQntds = [0.2, 0.2];
            $fonte = $this->getMockBuilder('Fonte')->setMethods(['getIdFonte'])->getMock();
            $fonte->expects($this->once())->method('getIdFonte')->with($this->equalTo('OMS'))->willReturn(3);
            $id_fonte = $fonte->getIdFonte('OMS');
            $stringEsperada = "Nome do alimento do tipo receita: Brigadeiro14 Quantidade: 100 Energia: 0.4 Proteina: 0.4 Carboidrato: 0.4 Lipideo: 0.4 Calcio: 0.4 Ferro: 0.4 Vit. C: 0.4 Vit. A: 0.4";
            $this->assertEquals($stringEsperada, calcularProporcaoReceita($nomeReceita, $gramasReceita, $arrayIngredientes, $arrayMedidas, $arrayQntds, null, $id_fonte));
        }

    
    }   

?>
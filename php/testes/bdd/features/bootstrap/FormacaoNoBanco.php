<?php

use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Infra\EntitymanagerCreator;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Defines application features from the specific context.
 */
class FormacaoNoBanco implements Context
{
    private EntityManagerInterface $em;
    private int $idFormacaoInserida;

    /**
     * @Given que estou conectado ao banco de dados
     */
    public function queEstouConectadoAoBancoDeDados()
    {
        $this->em = (new EntitymanagerCreator())->getEntityManager();
    }

    /**
     * @When tento salvar uma nova formação coma descrição :arg1
     */
    public function tentoSalvarUmaNovaFormacaoComaDescricao(string $descricaoFormacao)
    {
        $formacao = new Formacao();
        $formacao->setDescricao($descricaoFormacao);

        $this->em->persist($formacao);
        $this->em->flush();

        $this->idFormacaoInserida = $formacao->getId();
    }

    /**
     * @Then se eu buscar no banco, devo encontrar essa formação
     */
    public function seEuBuscarNoBancoDevoEncontrarEssaFormacao()
    {
        $repositorio = $this->em->getRepository(Formacao::class);
        /** @var Formacao $formacao */
        $formacao = $repositorio->find($this->idFormacaoInserida);

        assert($formacao instanceof Formacao);
    }
}

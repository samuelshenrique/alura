import { useContext, useEffect, useMemo } from "react";
import { CarrinhoContext } from '../context/CarrinhoContext';

export const useCarrinhoContext = () => {
  const {
    carrinho,
    dispatch,
    quantidade,
    valorTotal,
  } = useContext(CarrinhoContext);

  function mudarQuantidade(id, quantidade) {
    return carrinho.map((itemDoCarrinho) => {
      if (itemDoCarrinho.id === id) {
        itemDoCarrinho.quantidade += quantidade;
      }
      return itemDoCarrinho;
    });
  }

  function adicionarProduto(novoProduto) {
    const temOProduto = carrinho.some((item) => {
      return item.id === novoProduto.id
    });

    if (!temOProduto) {
      novoProduto.quantidade = 1;
      return setCarrinho((carrinhoAnterior) => [
        ...carrinhoAnterior,
        novoProduto
      ]);
    }

    const carrinhoAtualizado = mudarQuantidade(novoProduto.id, 1);
    setCarrinho(carrinhoAtualizado);
  }

  function removerProduto(idProduto) {
    const produto = carrinho.find((item) => item.id === idProduto);

    if (!produto) {
      return;
    }

    if (produto.quantidade > 1) {
      const carrinhoAtualizado = mudarQuantidade(idProduto, -1);
      return setCarrinho(carrinhoAtualizado);
    }

    setCarrinho((carrinhoAnterior) => carrinhoAnterior.filter((item) => item.id !== produto.id));
  }

  function removerProdutoCarrinho(idProduto) {
    const produto = carrinho.find((item) => item.id === idProduto);

    if (!produto) {
      return;
    }

    setCarrinho((carrinhoAnterior) => carrinhoAnterior.filter((item) => item.id !== produto.id));
  }

  const { totalTemp, quantidadeTemp } = useMemo(() => {
    return carrinho.reduce(
      (acumulador, produto) => ({
        quantidadeTemp: acumulador.quantidadeTemp + produto.quantidade,
        totalTemp: acumulador.totalTemp + produto.preco * produto.quantidade
      }),
      {
        quantidadeTemp: 0,
        totalTemp: 0
      }
    );
  }, [carrinho]);

  useEffect(() => {
    setQuantidade(quantidadeTemp);
    setValorTotal(totalTemp);
  });

  return {
    carrinho,
    setCarrinho,
    adicionarProduto,
    removerProduto,
    removerProdutoCarrinho,
    valorTotal,
    quantidade,
  };
}
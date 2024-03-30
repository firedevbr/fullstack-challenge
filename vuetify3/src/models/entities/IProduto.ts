import BaseRecord from '@/models/BaseRecord';
import IProdutoCategoria from '@/models/entities/IProdutoCategoria';

interface IProduto extends BaseRecord {
  nome: string;
  categoria: IProdutoCategoria;
  categoria_id: number;
}

export default IProduto;
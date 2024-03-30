import axiosInstance from '@/lib/http';
import IProdutoCategoria from '@/models/entities/IProdutoCategoria';
import IFormProdutoCategoria from '@/models/forms/IFormProdutoCategoria';
import IFiltrarProdutoCategoria from '@/models/forms/IFiltrarProdutoCategoria';
import PagedResponse from '@/models/entities/PagedResponse';
import qs from 'qs';

class ProdutoCategoriaService {

  async getById(id: number): Promise<IProdutoCategoria> {
    const result = await axiosInstance.get(`/api/produtos-categorias/${id}`);
    return result.data;
  }

  async deleteById(id: number): Promise<void> {
    const result = await axiosInstance.delete(`/api/produtos-categorias/${id}`);
    return;
  }

  async save(data: IFormProdutoCategoria): Promise<IProdutoCategoria> {
    const result = await axiosInstance.post(`/api/produtos-categorias`, data);
    return result.data;
  }

  async update(data: IFormProdutoCategoria, id: number): Promise<IProdutoCategoria> {
    const result = await axiosInstance.put(`/api/produtos-categorias/${id}`, data);
    return result.data;
  }

  async getAll(): Promise<IProdutoCategoria[]> {
    const result = await axiosInstance.get(`/api/produtos-categorias/all`);
    return result.data;
  }

  async filter(filtro: IFiltrarProdutoCategoria): Promise<PagedResponse<IProdutoCategoria[]>> {
    const filteredQuery = Object.fromEntries(
      Object.entries(filtro).filter(
        ([_, value]) => value !== null && value !== ''
      )
    );

    const queryString = qs.stringify(filteredQuery);

    const res = await axiosInstance.get(`/api/produtos-categorias?${queryString}`);
    return res.data;
  }
}

export default new ProdutoCategoriaService();
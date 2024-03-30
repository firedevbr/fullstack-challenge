import axiosInstance from '@/lib/http';
import IProduto from '@/models/entities/IProduto';
import IFormProduto from '@/models/forms/IFormProduto';
import IFiltrarProduto from '@/models/forms/IFiltrarProduto';
import PagedResponse from '@/models/entities/PagedResponse';
import qs from 'qs';

class ProdutoService {

  async getById(id: number): Promise<IProduto> {
    const result = await axiosInstance.get(`/api/produtos/${id}`);
    return result.data;
  }

  async deleteById(id: number): Promise<void> {
    const result = await axiosInstance.delete(`/api/produtos/${id}`);
    return;
  }

  async save(data: IFormProduto): Promise<IProduto> {
    const result = await axiosInstance.post(`/api/produtos`, data);
    return result.data;
  }

  async update(data: IFormProduto, id: number): Promise<IProduto> {
    const result = await axiosInstance.put(`/api/produtos/${id}`, data);
    return result.data;
  }

  async getAll(): Promise<IProduto[]> {
    const result = await axiosInstance.get(`/api/produtos/all`);
    return result.data;
  }

  async filter(filtro: IFiltrarProduto): Promise<PagedResponse<IProduto[]>> {
    const filteredQuery = Object.fromEntries(
      Object.entries(filtro).filter(
        ([_, value]) => value !== null && value !== ''
      )
    );

    const queryString = qs.stringify(filteredQuery);

    const res = await axiosInstance.get(`/api/produtos?${queryString}`);
    return res.data;
  }
}

export default new ProdutoService();
import { useAuthStore } from '@/store/authStore';
import IUser from '@/models/entities/IUser';

class AuthService {
  async logout(): Promise<void> {
    const authStore = useAuthStore();
    authStore.clearToken();
  }

  getLoggedAdminAreaUserData(): IUser | null {
    const authStore = useAuthStore();
    return authStore.user;
  }

  usuarioPossuiPermissao(permissoesRequeridas: string | string[]): boolean {
    return true;
  }
}

export default new AuthService();

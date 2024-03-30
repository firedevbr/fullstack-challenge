import axios from 'axios';
import MockAdapter from 'axios-mock-adapter';

const mockAxios = new MockAdapter(axios);

const useLoginStoreMock = () => {
  return {
    _token: null,
    _user: null,

    set token(value) {
      this._token = value;
    },
    get token() {
      return this._token;
    },
    set user(value) {
      this._user = value;
    },
    get user() {
      return this._user;
    }
  };
};

const useAxiosStoreMock = () => {
  return {
    axiosInstance: axios
  };
};

export {
  useLoginStoreMock as useLoginStore,
  useAxiosStoreMock as useAxiosStore
};
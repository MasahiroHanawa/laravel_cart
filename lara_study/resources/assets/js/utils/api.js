import axios from 'axios';

const apiClient = () => {
  const apiInfo = axios.create({
    baseURL: 'http://localhost/api',
    timeout: 10000,
  });
  return apiInfo;
};

export default apiClient;
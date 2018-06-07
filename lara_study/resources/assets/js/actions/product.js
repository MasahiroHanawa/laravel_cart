import apiClient from '../utils/api';
import * as constants from '../constants';

export function search () {
  return (dispatch) => {
    apiClient().get('/products')
      .then((response) => {
        dispatch({
          type: constants.GET_PRODUCT,
          products: response.data.products
        })
      })
      .catch((response) => {
        dispatch({
          type: constants.CONNECTION_FAILED,
          products: response
        })
      })
  }
}

import apiClient from '../utils/api';
import * as constants from '../constants';

export function setParam (name, param) {
  return (dispatch) => {
    dispatch({
      type: constants.SET_PARAM,
      param: name
    })
  }
}

export function search (params) {
  return (dispatch) => {
    apiClient().get('/products', { params })
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
      }
    )
  }
}

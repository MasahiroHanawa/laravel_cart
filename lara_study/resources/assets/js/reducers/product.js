import * as constants from '../constants';

const initialState = {
  product: null,
  message: null
}

export default function search(state = initialState, action) {
  switch (action.type) {
    case constants.GET_PRODUCT:
      return {
        product: action.product,
        message: null
      }
    default:
      return {
        product: null,
        message: null
      }
  }
}

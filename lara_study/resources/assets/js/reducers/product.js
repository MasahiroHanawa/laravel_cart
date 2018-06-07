import * as constants from '../constants';

const initialState = {
  products: [],
  message: null
}

export default function search(state = initialState, action) {
  switch (action.type) {
    case constants.GET_PRODUCT:
      return {
        products: action.products,
        message: null
      }
    case constants.CONNECTION_FAILED:
      return {
        products: {
          data: []
        },
        message: 'Connection failed'
      }
    default:
      return {
        products: {
          data: []
        },
        message: null
      }
  }
}

import * as constants from '../constants';

const initialState = {
  params: {
    keyword: '',
    categoryId: null
  },
  products: [],
  message: null
}

export default function search(state = initialState, action) {
  switch (action.type) {
    case constants.SET_PARAM:
      state.params[action.name] = action.keyword
      console.log('パラムテスト');
      console.log(action);
      console.log(state.param);
      return {
        params: state.params,
        products: state.products,
        message: null
      }
    case constants.GET_PRODUCT:
      console.log(state);
      console.log(action);
      return {
        params: state.params,
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
        params: {
          keyword: '',
          categoryId: null
        },
        products: {
          data: []
        },
        message: null
      }
  }
}

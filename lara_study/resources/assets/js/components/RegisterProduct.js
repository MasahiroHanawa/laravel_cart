import React from 'react';
import * as prodictActions from '../actions/product';
import * as categoryActions from '../actions/category';
import { connect } from 'react-redux';
import { bindActionCreators } from 'redux';
import PropTypes from 'prop-types';

export class RegisterProduct extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: null,
      description: null,
      image_1: null,
      image_2: null,
      category: null
    }
  }
  
  componentDidMount() {
    debugger
  }

  onSubmitRegister() {

  }

  render() {
    return(
      <div>
        <form onsubmit={this.onSubmitRegister()}>
          <input type="text" name="name" value={this.state.name} />
          <input type="description" name="description" value={this.state.description} />
          <input type="file" name="image_1"/>
          <input type="file" name="image_2"/>
          <select name="category">
            { this.props.category ?
              <option value="1">test</option>
              :<img src="./images/loading.gif" /> 
            }
          </select>
        </form>
      </div>
    )
  }
}

RegisterProduct.proptypes = {
  productActions: PropTypes.shape({
    search: PropTypes.func.isRequired,
  }).isRequired,
  categoryActions: PropTypes.shape({
    search: PropTypes.func.isRequired,
  }).isRequired,
  product: PropTypes.shape({
    list: PropTypes.array.isRequired,
  }).isRequired,
  category: PropTypes.shape({
    list: PropTypes.array.isRequired,
  }).isRequired,
};

const mapStateToProps = (state) => {
  const stateToProps = {
    ...state.product,
    ...state.category,
  };
  return stateToProps;
};
const mapDispatchToProps = (dispatch) => {
  const dispatchProps = {
    actions: bindActionCreators({
      ...prodictActions,
      ...categoryActions,
    }, dispatch),
  };
  return dispatchProps;
};

export default connect(mapStateToProps, mapDispatchToProps)(RegisterProduct)

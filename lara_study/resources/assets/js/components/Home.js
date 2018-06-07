import React from 'react';
import * as actions from '../actions/product';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { bindActionCreators } from 'redux';
import {
  Grid,
  Row,
  Col,
  Button,
} from 'react-bootstrap';

export class Home extends React.Component {
  constructor(props) {
    super(props);
  }
  
  componentDidMount() {
    this.props.actions.search();
  }

  render() {
    let products = null;
    if (this.props.products.products.data.length > 0) {
      products = this.props.products.products.data.map((product) => {
        let cartClassName = '';
        if (product.stock > 0) {
          cartClassName = 'sell';
        } else {
          cartClassName = 'sold_out';
        }
        return (
          <Col xs={12} md={4} key={product.id}>
            <div className="item">
              <div className="avatar"><img src={product.image_1} alt="" /></div>
              <div className="title-header">
                <h3>{product.name}</h3>
              </div>
              <div className={cartClassName}>
                <Button className="btn-add" title="add">+</Button>
                <div>Sold out</div>
              </div>
            </div>
          </Col>
        );
      })
    }
    return(
      <div>
        <Grid>
          <Row>
            {products}
          </Row>
        </Grid>
      </div>
    )
  }
}

Home.propTypes = {
  actions: PropTypes.shape({
    search: PropTypes.func.isRequired
  }),
  products: PropTypes.shape({
    products: PropTypes.object,
    message: PropTypes.string,
  })
};

const mapStateToProps = (state) => {
  const stateToProps = {
    products: {
      ...state.product
    }
  };
  return stateToProps;
};

const mapDispatchProps = (dispatch) => {
  const dispatchProps = {
    actions: bindActionCreators({
      ...actions,
    }, dispatch)
  };
  return dispatchProps;
};

export default connect(mapStateToProps, mapDispatchProps)(Home)

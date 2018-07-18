import React from 'react';
import PropTypes from 'prop-types';
import PagerButton from '../Atoms/PagerButton';
import Pager from '../Molecules/Pager';
import {
  Grid,
  Row,
  Col,
  Button,
  FormGroup,
  FormControl,
} from 'react-bootstrap';

export default class Product extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return(
      <Row>{(() => {
        let products = null;
        if (this.props.home.products.products.data.length > 0) {
          products = this.props.home.products.products.data.map((product) => {
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
        return products;
      })()}
        <Pager home={this.props.home}/>
      </Row>);
  }
}

import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import numeral from 'numeral';

function App() {
    const [data, setData] = useState();

    useEffect(() => {
        async function fetchData() {
            try {
                const res = await axios.get('api/circumferences');
                setData(res.data);
            } catch (err) {
                console.log(err);
            }
        }

        fetchData();
    }, []);

    return  (
        <div className="container-fluid flex-grow-1">
            {
                data !== undefined ? (
                    <>
                        <div className="row">
                            <div className="col-md-4"><h2 className="text-white">Current Pi computed from server:</h2></div>
                        </div>
                        <div className="row">
                            <div className="col-md-4"><h3 className="text-white">{data.current_pi}</h3></div>
                        </div>
                        <div className="row">
                            <div className="col-md-4"><h2 className="text-white">Circumference of the sun:</h2></div>
                        </div>
                        <div className="row">
                            <div className="col-md-4"><h3 className="text-white">{numeral(data.circumference_of_the_sun).format('0.0000a')} km</h3></div>
                        </div>
                    </>
                ) : (
                    <div className="row">
                        <div className="col-md-4"><h2>Loading...</h2></div>
                    </div>
                )
            }

        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}

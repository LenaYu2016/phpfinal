import React from 'react';
import YouTube from 'YouTube';

const KEY = 'AIzaSyAlWFKOQSQvQx2Xr9qw7i8siK7ktQlGcco';
const URL = `https://www.googleapis.com/youtube/v3/search?key=${KEY}&part=snippet`;

export default class TrailerApp extends React.Component {
  constructor() {
    super();
    this.state = {videoId: '', showPlayer: false}
  }

  handleSubmit = (event) => {
    event.preventDefault();
    $.get(`${URL}&q=${event.target.movieName.value}`).then(data => {
      let id = data.items[0].id.videoId;
      this.setState({videoId: id, showPlayer: true});
    })
  };

  render() {
    return (
        <div>
          <form action="" name="trailerSearchForm"
            onSubmit={this.handleSubmit}>
            <input type="text" name="movieName"/>
            <button type="submit" name="submit">search</button>
          </form>
          {(() => {
            if(this.state.showPlayer) {
              return <YouTube
                  videoId={this.state.videoId}
              />;
            }
          })()}
        </div>
    );
  }
}


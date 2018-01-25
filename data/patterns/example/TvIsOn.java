package example;

public class TvIsOn implements Command {
	private Tv tv;

	public TvIsOn(Tv tv) {
		this.tv = tv;
	}

	@Override
	public void execute() {
		tv.on();
		tv.setVolume(35);
	}
}
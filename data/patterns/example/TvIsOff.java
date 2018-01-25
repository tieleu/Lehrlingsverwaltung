package example;

public class TvIsOff implements Command {
	private Tv tv;

	public TvIsOff(Tv tv) {
		this.tv = tv;
	}

	@Override
	public void execute() {
		tv.off();
	}
}
